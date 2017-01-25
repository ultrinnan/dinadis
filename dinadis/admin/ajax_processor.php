<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/wp-config.php' );

$site_options = get_option('site_options');

switch ($_POST['action']) {
	case 'send':
		// var_dump($_POST);
		$name = $_POST['name']?$_POST['name']:'';
		$email = $_POST['email']?$_POST['email']:'';
		$subject = $_POST['subject']?$_POST['subject']:'';
		$comment = $_POST['comment']?$_POST['comment']:'';
		
		$address = $site_options['main_email'];
		// $address = "sergey.fedirko@gmail.com";
		$from_mail = $site_options['main_email'];

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

		// Дополнительные заголовки
		$headers .= 'From: '. $from_mail . "\r\n";
		if (isset($copy_email)) {
			$headers .= 'Cc: '. $copy_email . "\r\n";
		}
		$sub = "DINADIS - новий запрос с сайта. " . $subject;
		$mes = "Имя: " . $name . "<br>Email: " . $email . "<br>Комментарий: ".$comment."<br>";
		// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
		$mes = wordwrap($mes, 70, "\r\n");
		// Отправляем
		$send = mail($address,$sub,$mes,$headers);
		var_dump($address,$sub,$mes,$headers);
		if($send) {
			echo 'success';
		} else echo 'error';
	break;
	case 'exhib_send':
		// var_dump($_POST);
		$contact_person = $_POST['contact_person'] ? $_POST['contact_person'] : '';
		$phone = $_POST['phone'] ? $_POST['phone'] : '';
		$email = $_POST['email'] ? $_POST['email'] : '';
		$date = $_POST['date'] ? $_POST['date'] : '';
		$room_count = $_POST['room_count'] ? $_POST['room_count'] : '';
		$guest_count = $_POST['guest_count'] ? $_POST['guest_count'] : '';
		$subject = $_POST['subject'] ? $_POST['subject'] : '';
		$comment = $_POST['comment'] ? $_POST['comment'] : '';
		$budget = $_POST['budget'] ? $_POST['budget'] : '';

		$address = $site_options['main_email'];
		// $address = "sergey.fedirko@gmail.com";
		$from_mail = $site_options['main_email'];

		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

		// Дополнительные заголовки
		$headers .= 'From: '. $from_mail . "\r\n";
		if (isset($copy_email)) {
			$headers .= 'Cc: '. $copy_email . "\r\n";
		}
		$sub = "DINADIS - новий запрос на подбор выставки. " . $subject;
		$mes = "Имя: " . $contact_person . "<br>Email: " . $email . "<br>Комментарий: ".$comment."<br>Телефон: ".$phone."<br>Дата: ".$date."<br>Комнат: ".$room_count."<br>Гостей: ".$guest_count."<br>Выставка: ".$subject."<br>";
		// На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
		$mes = wordwrap($mes, 70, "\r\n");
		// Отправляем
		$send = mail($address,$sub,$mes,$headers);
		var_dump($address,$sub,$mes,$headers);
		if($send) {
			echo 'success';
		} else echo 'error';
	break;
	default:
		# code...
	break;
}

?>
