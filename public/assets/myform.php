<?php
require_once 'config.php';
set_time_limit(0);
$data['form_id'] = $_GET['form_id'];
if(!empty($data['form_id'])) {
	$standart_config = file_get_contents("../scripts/form-$data[form_id].php");
	$config['email_from'] = get_text_from_tags('\'to\' => \'', '\'', $standart_config);
	if(substr_count($config['email_from'], ',')>0) {
		$config['email_from'] = explode(',', $config['email_from']);
	}
	$config['email_subject_admin'] = get_text_from_tags('\'subject\' => \'', '\'', $standart_config);
	$email_subject_admin = explode(' ', $config['email_subject_admin'], 2);
	$config['email_subject_admin'] = count($email_subject_admin)>1?$email_subject_admin[1]:$email_subject_admin[0];
}
$i = 0; $files = array();
foreach($_FILES['upload_file']['error'] as $error) {
	if(!$error) {
		$file_name_for_save = uniqid().'.'.end(explode('.', $_FILES['upload_file']['name'][$i]));
		$files[$file_name_for_save] = file_get_contents($_FILES['upload_file']['tmp_name'][$i]);
	}
	$i++;
}
$config['email_user_files'] = array($_GET['file']);
$user_files = array();
foreach($config['email_user_files'] as $email_user_file) {
	$email_user_file = trim($email_user_file);
	if(!empty($email_user_file)) {
		$pathinfo = pathinfo($email_user_file);
		//$basename = basename($email_user_file);
		$content = file_get_contents('../'.$email_user_file);
if(!empty($content)) {
   $user_files[$pathinfo['basename']] = $content;
}
	}
}
$data['name'] = $_GET['name'];
$data['email'] = $_GET['email'];
$data['phone1'] = $_GET['phone1'];
$data['phone2'] = $_GET['phone2'];
$data['message'] = $_GET['message'];
$data['custom'] = $_GET['custom'];
$data['utm'] = $_GET['utm'];
$data['counter'] = $_GET['counter'];
$order_id = file_get_contents('orders_count.txt');
$order_id = intval($order_id);
if($data['counter']=='true' || $data['counter']=='1') {
	$order_id = $order_id + 1;
    file_put_contents('orders_count.txt', $order_id);
}

$data_name = iconv("utf8", "windows-1251", str_replace(';', '', $data['name']));
$data_email = iconv("utf8", "windows-1251", str_replace(';', '', $data['email']));
$data_phone = iconv("utf8", "windows-1251", str_replace(';', '', $data['phone2']));
file_put_contents('formdata.csv', $order_id.';'.date('d.m.y H:i', time()+$config['timezone']*60).';'.$data_name.';'.$data_email.';'.$data_phone.PHP_EOL, FILE_APPEND);

$config['email_subject_user'] = str_replace('{ORDER_ID}', $order_id, $config['email_subject_user']);
$config['email_subject_user'] = str_replace('{USER_NAME}', $data['name'], $config['email_subject_user']);
$config['email_subject_user'] = str_replace('{USER_EMAIL}', $data['email'], $config['email_subject_user']);
$config['email_subject_user'] = str_replace('{ADMIN_PHONE}', $data['phone1'], $config['email_subject_user']);
$config['email_subject_user'] = str_replace('{USER_PHONE}', $data['phone2'], $config['email_subject_user']);
$config['email_subject_user'] = str_replace('{USER_MESSAGE}', $data['message'], $config['email_subject_user']);
$config['email_subject_user'] = str_replace('{USER_CUSTOM}', $data['custom'], $config['email_subject_user']);
$config['email_subject_user'] = str_replace('{USER_UTM}', $data['utm'], $config['email_subject_user']);
$config['email_subject_user'] = str_replace('{USER_IP}', $_SERVER['REMOTE_ADDR'], $config['email_subject_user']);
$config['email_subject_user'] = str_replace('{WEB_SITE}', $_SERVER['HTTP_HOST'], $config['email_subject_user']);
$config['email_subject_admin'] = str_replace('{ORDER_ID}', $order_id, $config['email_subject_admin']);
$config['email_subject_admin'] = str_replace('{USER_NAME}', $data['name'], $config['email_subject_admin']);
$config['email_subject_admin'] = str_replace('{USER_EMAIL}', $data['email'], $config['email_subject_admin']);
$config['email_subject_admin'] = str_replace('{ADMIN_PHONE}', $data['phone1'], $config['email_subject_admin']);
$config['email_subject_admin'] = str_replace('{USER_PHONE}', $data['phone2'], $config['email_subject_admin']);
$config['email_subject_admin'] = str_replace('{USER_MESSAGE}', $data['message'], $config['email_subject_admin']);
$config['email_subject_admin'] = str_replace('{USER_CUSTOM}', $data['custom'], $config['email_subject_admin']);
$config['email_subject_admin'] = str_replace('{USER_UTM}', $data['utm'], $config['email_subject_admin']);
$config['email_subject_admin'] = str_replace('{USER_IP}', $_SERVER['REMOTE_ADDR'], $config['email_subject_admin']);
$config['email_subject_admin'] = str_replace('{WEB_SITE}', $_SERVER['HTTP_HOST'], $config['email_subject_admin']);
$config['email_body_user'] = str_replace('{ORDER_ID}', $order_id, $config['email_body_user']);
$config['email_body_user'] = str_replace('{USER_NAME}', $data['name'], $config['email_body_user']);
$config['email_body_user'] = str_replace('{USER_EMAIL}', $data['email'], $config['email_body_user']);
$config['email_body_user'] = str_replace('{ADMIN_PHONE}', $data['phone1'], $config['email_body_user']);
$config['email_body_user'] = str_replace('{USER_PHONE}', $data['phone2'], $config['email_body_user']);
$config['email_body_user'] = str_replace('{USER_MESSAGE}', $data['message'], $config['email_body_user']);
$config['email_body_user'] = str_replace('{USER_CUSTOM}', $data['custom'], $config['email_body_user']);
$config['email_body_user'] = str_replace('{USER_UTM}', $data['utm'], $config['email_body_user']);
$config['email_body_user'] = str_replace('{USER_IP}', $_SERVER['REMOTE_ADDR'], $config['email_body_user']);
$config['email_body_user'] = str_replace('{WEB_SITE}', $_SERVER['HTTP_HOST'], $config['email_body_user']);
$config['email_body_admin'] = str_replace('{ORDER_ID}', $order_id, $config['email_body_admin']);
$config['email_body_admin'] = str_replace('{USER_NAME}', $data['name'], $config['email_body_admin']);
$config['email_body_admin'] = str_replace('{USER_EMAIL}', $data['email'], $config['email_body_admin']);
$config['email_body_admin'] = str_replace('{ADMIN_PHONE}', $data['phone1'], $config['email_body_admin']);
$config['email_body_admin'] = str_replace('{USER_PHONE}', $data['phone2'], $config['email_body_admin']);
$config['email_body_admin'] = str_replace('{USER_MESSAGE}', $data['message'], $config['email_body_admin']);
$config['email_body_admin'] = str_replace('{USER_CUSTOM}', $data['custom'], $config['email_body_admin']);
$config['email_body_admin'] = str_replace('{USER_UTM}', $data['utm'], $config['email_body_admin']);
$config['email_body_admin'] = str_replace('{USER_IP}', $_SERVER['REMOTE_ADDR'], $config['email_body_admin']);
$config['email_body_admin'] = str_replace('{WEB_SITE}', $_SERVER['HTTP_HOST'], $config['email_body_admin']);
switch($config['email']) {
	case 1:
		if(!empty($data['email'])) {
			if(is_array($config['email_from'])) {
				$email_from = $config['email_from'][0];
			} else {
				$email_from = $config['email_from'];
			}
			@send_email($data['name'], $data['email'], $config['email_subject_user'], $config['email_body_user'], $config['name_from'], $email_from, $user_files);
		}
	break;
	case 2:
		if(!empty($config['email_from'])) {
			if(is_array($config['email_from'])) {
				$email_from = $config['email_from'];
			} else {
				$email_from = array($config['email_from']);
			}
			foreach($email_from as $email_from_i) {
				if($config['from_user'] && !empty($data['email'])) {
					@send_email($config['name_from'], $email_from_i, $config['email_subject_admin'], $config['email_body_admin'], $data['name'], $data['email'], $files);
				} else {
					@send_email($config['name_from'], $email_from_i, $config['email_subject_admin'], $config['email_body_admin'], $config['name_from'], $email_from_i, $files);
				}
			}
		}
	break;
	case 3:
		if(!empty($config['email_from'])) {
			if(is_array($config['email_from'])) {
				$email_from = $config['email_from'];
			} else {
				$email_from = array($config['email_from']);
			}
			foreach($email_from as $email_from_i) {
				if($config['from_user'] && !empty($data['email'])) {
					@send_email($config['name_from'], $email_from_i, $config['email_subject_admin'], $config['email_body_admin'], $data['name'], $data['email'], $files);
				} else {
					@send_email($config['name_from'], $email_from_i, $config['email_subject_admin'], $config['email_body_admin'], $config['name_from'], $email_from_i, $files);
				}
			}
			sleep(1);
		}
		if(!empty($data['email'])) {
			if(is_array($config['email_from'])) {
				$email_from = $config['email_from'][0];
			} else {
				$email_from = $config['email_from'];
			}
			@send_email($data['name'], $data['email'], $config['email_subject_user'], $config['email_body_user'], $config['name_from'], $email_from, $user_files);
		}
	break;
	default:
}
$config['sms_body_user'] = str_replace('{ORDER_ID}', $order_id, $config['sms_body_user']);
$config['sms_body_user'] = str_replace('{USER_NAME}', $data['name'], $config['sms_body_user']);
$config['sms_body_user'] = str_replace('{USER_EMAIL}', $data['email'], $config['sms_body_user']);
$config['sms_body_user'] = str_replace('{ADMIN_PHONE}', $data['phone1'], $config['sms_body_user']);
$config['sms_body_user'] = str_replace('{USER_PHONE}', $data['phone2'], $config['sms_body_user']);
$config['sms_body_user'] = str_replace('{USER_MESSAGE}', $data['message'], $config['sms_body_user']);
$config['sms_body_user'] = str_replace('{USER_CUSTOM}', $data['custom'], $config['sms_body_user']);
$config['sms_body_user'] = str_replace('{USER_UTM}', $data['utm'], $config['sms_body_user']);
$config['sms_body_admin'] = str_replace('{ORDER_ID}', $order_id, $config['sms_body_admin']);
$config['sms_body_admin'] = str_replace('{USER_NAME}', $data['name'], $config['sms_body_admin']);
$config['sms_body_admin'] = str_replace('{USER_EMAIL}', $data['email'], $config['sms_body_admin']);
$config['sms_body_admin'] = str_replace('{ADMIN_PHONE}', $data['phone1'], $config['sms_body_admin']);
$config['sms_body_admin'] = str_replace('{USER_PHONE}', $data['phone2'], $config['sms_body_admin']);
$config['sms_body_admin'] = str_replace('{USER_MESSAGE}', $data['message'], $config['sms_body_admin']);
$config['sms_body_admin'] = str_replace('{USER_CUSTOM}', $data['custom'], $config['sms_body_admin']);
$config['sms_body_admin'] = str_replace('{USER_UTM}', $data['utm'], $config['sms_body_admin']);
switch($config['sms']) {
	case 1:
		if(!empty($data['phone2'])) {
			@send_sms($data['phone2'], $config['sms_body_user'], $config['sms_from'], $config['sms_api']);
		}
	break;
	case 2:
		if(!empty($data['phone1'])) {
			@send_sms($data['phone1'], $config['sms_body_admin'], $config['sms_from'], $config['sms_api']);
		}
	break;
	case 3:
		if(!empty($data['phone1']) || !empty($data['phone2'])) {
			@send_sms($data['phone1'], $config['sms_body_admin'], $config['sms_from'], $config['sms_api']);
			sleep(1);
			@send_sms($data['phone2'], $config['sms_body_user'], $config['sms_from'], $config['sms_api']);
		}
	break;
	default:
}
function send_email($name_to, $email_to, $subject, $body, $name_from='', $email_from='', $files=null) {
	$data_charset = 'utf-8';
	$send_charset = 'windows-1251';
	if(!empty($email_to)) {
		$boundary = '--'.md5(uniqid(time()));
		$mailheaders = "MIME-Version: 1.0;\n";
		$mailheaders .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\n";
		$name_from = empty($name_from)?'robot':$name_from;
		$email_from = empty($email_from)?'robot@'.$_SERVER['SERVER_NAME']:$email_from;
		$from = mime_header_encode($name_from, $data_charset, $send_charset).' <'.$email_from.'>';
		$mailheaders .= "From: $from\n";
		$multipart = "\n--$boundary\n"; 
		$multipart .= "Content-Type: text/html; charset=windows-1251\n";
		$multipart .= "Content-Transfer-Encoding: base64\n\n";
		if($data_charset != $send_charset) {
			//$body = iconv($data_charset, $send_charset.'//IGNORE', $body);
			mb_substitute_character('none');
			ini_set('mbstring.substitute_character', 'none');
			$body = mb_convert_encoding($body, $send_charset, $data_charset);
		}
		$multipart .= chunk_split(base64_encode($body), 76, "\n");
		if((is_array($files))&&(!empty($files))&&(count($files)>0)) {
			foreach($files as $filename => $filecontent) {
				$message_part = "\n--$boundary\n";
				$message_part .= "Content-Type: application/octet-stream; name=\"$filename\"\n";  
				$message_part .= "Content-Transfer-Encoding: base64\n"; 
				$message_part .= "Content-Disposition: attachment; filename=\"$filename\"\n\n"; 
				$message_part .= chunk_split(base64_encode($filecontent), 76, "\n");
				$multipart .= $message_part;
				$multipart .= "\n";
			}
			$multipart .= "--$boundary--\n";
		}
		$to = mime_header_encode($name_to, $data_charset, $send_charset).' <'.$email_to.'>';
		$subject = mime_header_encode($subject, $data_charset, $send_charset);
		return mail($to, $subject, $multipart, $mailheaders);
	} else {
		return false;
	}
}
function mime_header_encode($str, $data_charset, $send_charset) {
	if($data_charset != $send_charset) {
		//$str = iconv($data_charset, $send_charset.'//IGNORE', $str);
		mb_substitute_character('none');
		ini_set('mbstring.substitute_character', 'none');
		$str = mb_convert_encoding($str, $send_charset, $data_charset);
	}
	return '=?'.$send_charset.'?B?'.base64_encode($str).'?=';
}
function send_sms($phone, $message, $from, $api_id) {
	if(!empty($phone)) {
		$message = urlencode($message);
		// http://sms.ru/?panel=api&subpanel=method&show=sms/send
		$url = "http://sms.ru/sms/send?api_id=$api_id&to=$phone&text=$message&from=$from";
		if(function_exists('curl_init')) {
			if($curl = curl_init()) {
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$result = curl_exec($curl);
				curl_close($curl);
			} else { $result==''; }
		} else {
			$result = file_get_contents($url);
		}
		$result = trim($result);
		if($result=='100') {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
function get_text_from_tags($tag1, $tag2, $text) {
	preg_match_all("|$tag1(.+)$tag2|isU", $text, $match);
	return $match[1][0];
}
?>
