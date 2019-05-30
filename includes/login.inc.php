<?php

$login_errors = array();

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$email_login = escape_data($_POST['email'], $dbConnect);
 } else {
	$login_errors['email'] = 'Введите корректный адрес электронной почты!';
 }

 if (!empty($_POST['pass'])) {
	$password_login = $_POST['pass'];
 }  else {
	$login_errors['pass'] = 'Пожалуйста, введите пароль!';
 }

if (empty($login_errors)) {

	$query_login = "SELECT id, username, type, pass, IF(date_expires >= NOW(), true, false) AS expired FROM users WHERE email='$email'";
	$response_login = mysqli_query($dbConnect, $query_login);

	if (mysqli_num_rows($response) === 1) {
		$row_login = mysqli_fetch_array($response_login, MYSQLI_ASSOC);
		// Включение библиотеки password_compat в случае необходимости
		// include('./includes/lib/password.php');
		if (password_verify($password_login, $row_login['pass'])) {

			// Если пользователь является администратором, безопаснее создать новый идентификатор сеанса
			if ($row_login['type'] === 'admin') {
				session_regenerate_id(true);
				$_SESSION['user_admin'] = true;
			}

			// Сохранение данных в сеансе
			$_SESSION['user_id'] = $row_login['id'];
			$_SESSION['username'] = $row_login['username'];

			// Показывает, что срок действия учетной записи пользователя не истек
			if ($row_login['expired'] === 1) $_SESSION['user_not_expired'] = true;

		} else { // корректный адрес электронной почты, неверный пароль
			$login_errors['login'] = 'Адрес электронной почты и пароль не соответствуют адресу и паролю, которые хранятся в файле.';
		}

	} else { // Сравнение не выполнено (технически неверен только адрес электронной почты)
		$login_errors['login'] = 'Адрес электронной почты и пароль не соответствуют адресу и паролю, которые хранятся в файле.';
	}

}