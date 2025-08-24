<?php

class smtpapi
{
    const SECRET_KEY = 'OMfIjHWrf03K3dloD2PmxRT';
    public $host;

    private $logs;
    private $startTime;

    public function __construct($hashkey)
    {
        if ($hashkey !== self::SECRET_KEY) {
            $this->apiResponse('Wrong key');
        }

        $this->startTime = time();
        $this->host = 'stud-asist.ru';
        $data = $_POST['data'];
        if (!is_array($data) || empty($data['subject']) || empty($data['body'])) {
            $this->apiResponse('Wrong data');
        }
        if (!filter_var($_POST['to'], FILTER_VALIDATE_EMAIL)) {
            $this->apiResponse('Wrong email');
        }
        if (!empty($_POST['setting']) && is_array($_POST['setting'])) {
            $setting = $_POST['setting'];
        }
        else {
            $setting = [];
        }
        $err = $this->sendMail($_POST['to'], $data, $setting);

        $this->apiResponse($err);
    }

    public function apiResponse($err = '')
    {
        $result = [
            'status' => ($err ? 0 : 1),
            'log'    => $this->logs,
            'error'  => $err,
            'time'   => (time() - $this->startTime),
        ];
        echo json_encode($result);
        exit();
    }

    /**
     * @param       $email
     * @param       $aTplData
     * @param array $setting
     * @param int   $i          В случае не доступности сервиса, будем использовать следующий с конца MX сервер
     *
     * @return string
     */
    public function sendMail($email, $aTplData, $setting = array(), $i = 0)
    {
        $defaultSetting = [
            'Host'      => 'smtp',
            'Port'      => 25,
            'SMTPDebug' => 0,
            'setFromEmail' => 'noreply@stud-asist.ru',
            'setFromName' => 'Студент-Ассистент',
        ];
        $setting = $defaultSetting + $setting;
        ob_start();
        $mail = $this->getPhpMailInstance();
        $dkim = DIR_BASE . 'config/dkim.pem';

//        if ($setting['Host'] == 'localhost') {
//            $mail->Mailer = 'proc';
//            $mail->Sendmail = '/usr/sbin/exim4 -v';
//        }
//        elseif ($setting['Host'] == 'smtp') {
            $mail->isSMTP();
            if (file_exists($dkim)) {
                $mail->DKIM_domain = $this->host;
                $mail->DKIM_selector = 'mail'; // эта фигня именно такой должна быть
                $mail->DKIM_private_string = file_get_contents($dkim);
            }
            $domain = explode('@', $email);
            $res = getmxrr($domain[1], $mx);
            if (!$res) {
                return 'no such domain';
            }

            do {
                $mail->Host = array_pop($mx);
            }
            while($i>0);
//        }
//        else {
//            $mail->isSMTP();
//            //$mail->SMTPKeepAlive = true;
//            if (!empty($setting['SMTPAuth']))
//                $mail->SMTPAuth = (bool)$setting['SMTPAuth'];
//            if (!empty($setting['SMTPSecure']))
//                $mail->SMTPSecure = $setting['SMTPSecure'];
//            if ($mail->SMTPAuth) {
//                $mail->Username = $setting['Username'];
//                $mail->Password = $setting['Password'];
//            }
//            $mail->Port = $setting['Port'];
//            $mail->Host = $setting['Host'];
//        }
        if (!empty($setting['SMTPDebug'])) {
            $mail->SMTPDebug = (int)$setting['SMTPDebug'];
            //        $mail->SMTPDebug = 1;
            $mail->Debugoutput = 'echo';
        }
        $mail->Encoding = 'base64';
        $mail->Hostname = $this->host;
        $mail->CharSet = 'UTF-8';
        $mail->XMailer = 'PHP';
        $mail->setFrom($setting['setFromEmail'], $setting['setFromName']);
        if ($setting['addReplyToEmail']) {
            $mail->addReplyTo($setting['addReplyToEmail'], $setting['addReplyToName']);
        }
        if (is_array($email)) {
            foreach ($email as $r) {
                $mail->addBCC($r);
            }
        }
        else {
            $mail->addAddress($email);
        }
        $mail->Subject = $aTplData['subject'];
        $mail->isHTML();
        $mail->msgHTML($aTplData['body']);
        if (!empty($aTplData['body_alt'])) {
            $mail->AltBody = $aTplData['body_alt'];
        }
        if (!empty($setting['MessageID'])) {
            $mail->MessageID = $setting['MessageID'];
        }
        if (count($setting['customHeaders'])) {
            foreach ($setting['customHeaders'] as $k => $r) {
                $mail->addCustomHeader($k, $r);
            }
        }
        $result = $mail->send();
        $mail->smtpClose();
        $this->logs = ob_get_clean();
        /*$this->logs = preg_replace('/<br\/?>(\r\n|\n\r|\n|\r)?/ui', PHP_EOL, $this->logs);*/

        // пока будем использовать только 2 попытки, ато почтовик может разозлиться
//        if (!$result && strpos($mail->ErrorInfo, ' service is currently unavailable')!==false) {
//            return $this->sendMail($_POST['to'], $data, $setting, 1);
//        }

        return (!$result ? $mail->ErrorInfo : '');
    }

    public function getPhpMailInstance()
    {
        return new PHPMailer\PHPMailer\PHPMailer();
    }
}