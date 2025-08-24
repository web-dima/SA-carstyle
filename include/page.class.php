<?php

use Cimus\IpGeoBase\IpGeoBase;

class Page {
    const AJAX_STATUS_OK = 1;
    const AJAX_STATUS_ERROR = 0;
    public static $redirect = false;

    public function __construct()
    {
        if (!empty($_POST['smtpapi'])) {
            ini_set('max_execution_time', 300);
            require_once 'smtpapi.php';
            new smtpapi($_POST['smtpapi']);
            exit();
        }
//        if (!empty($_GET['phpinside'])) {
//            ini_set('max_execution_time', 300);
//            phpinfo();
//            exit();
//        }
        if (isset($_POST['semail']) && isset($_POST['squestion'])) {
            $semail = filter_var($_POST['semail'], FILTER_VALIDATE_EMAIL);
            if (!$semail) {
                self::ajaxResponse(self::AJAX_STATUS_ERROR, 'Email указан не правильный!');
            }

            $squestion = filter_var($_POST['squestion'], FILTER_SANITIZE_SPECIAL_CHARS);
            if (!$squestion) {
                self::ajaxResponse(self::AJAX_STATUS_ERROR, 'Текст не корректный! Разрешено использовать только стандартные буквы и цифры и знаки пунктуаций.');
            }
            $subject = 'Форма запроса от stud-asist.ru';
            $mess = 'Email: '.$semail.'<br>'.
                'Текст: '.$squestion.'<br>';
            $headers = [];
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=UTF-8';
            $headers[] = 'X-Mailer: PHP';
            if(mail('zakaz@freetimer.ru', $subject, $mess, implode("\r\n", $headers))) {
                self::ajaxResponse(self::AJAX_STATUS_OK);
            } else {
                self::ajaxResponse(self::AJAX_STATUS_ERROR, 'Ошибка сервера. Письмо не отправлено. Мы скоро все наладим, попробуйте позднее');
            }
        }
        // self::checkGeo();
    }

    public static function ajaxResponse($status, $mess = '') {
        $result = ['status' => $status];
        if ($mess)
            $result['message'] = $mess;
        echo json_encode($result);
        exit();
    }

    public static function renderFile($file) {
        ob_start();
        require DIR_TPL.$file;
        return ob_get_clean();
    }

    public function render() {
        return self::renderFile('layout.php');
    }

    public static function renderMenu() {
        return self::renderFile('menu.php');
    }

    public static function renderContent() {
        return self::renderFile('index.php');
    }

    public static function renderTitle() {
        return 'Онлайн-помощь студентам и репетиторство';
    }
    public static function renderDescription() {
        return '';
    }

    public static function renderScripts() {
        $html = '';
        if (self::$redirect) {
            $html = '<script>setTimeout(function () {location.href = "http://free-timer.ru"}, 1000);</script>';
        }
        return $html;
    }

    public function checkGeo() {
        $DB_PATH = DIR_BASE . 'geodb';
        $SEARCH = new IpGeoBase($DB_PATH);

        $info =  $SEARCH->search($_SERVER['REMOTE_ADDR']);

        if ($info['country'] == 'RU' && empty($_GET['test'])) {
            self::$redirect = true;
        }
    }
}