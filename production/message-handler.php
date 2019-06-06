<?php
	$name = htmlspecialchars($_POST['name']);
	$email = htmlspecialchars($_POST['email']);
	$phone = htmlspecialchars($_POST['tel']);
	$message = htmlspecialchars($_POST['reply-text']);
	$no_spam1 = htmlspecialchars($_POST['no_spam1']);
	$no_spam2 = htmlspecialchars($_POST['no_spam2']);
	$subject = 'Форма отправки сообщений';
	$to = "info@joy-bricks.co.ua";
	$headers = "From: " . $email . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=UTF-8\r\n";

	if ((preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) && empty($no_spam1) && ($no_spam2 == 9) && ($email != "") && ($subject != "") && ($message != "")) {
			if (mail($to, $subject, $message, $headers)) {
				echo 'Спасибо, Ваше сообщение отправлено';
			} else {
				echo 'К сожалению, при отправке сообщения возникла ошибка';
			}
		} else {
			echo 'К сожалению, форма заполнена неверно';
		};