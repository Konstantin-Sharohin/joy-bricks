<?php 

$login_errors = array();

if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	$e = escape_data($_POST['email'], $dbc);
 } else {
	$login_errors['email'] = 'Введите корректный адрес электронной почты!';
 }

 if (!empty($_POST['pass'])) {
	$p = $_POST['pass'];
 }  else {
	$login_errors['pass'] = 'Пожалуйста, введите пароль!';
 }
	
if (empty($login_errors)) {

	$q = "SELECT id, username, type, pass, IF(date_expires >= NOW(), true, false) AS expired FROM users WHERE email='$e'";		
	$r = mysqli_query($dbc, $q);

	if (mysqli_num_rows($r) === 1) {
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC); 
		// Включение библиотеки password_compat в случае необходимости
		// include('./includes/lib/password.php');
		if (password_verify($p, $row['pass'])) {
			
			// Если пользователь является администратором, безопаснее создать новый идентификатор сеанса
			if ($row['type'] === 'admin') {
				session_regenerate_id(true);
				$_SESSION['user_admin'] = true;
			}
		
			// Сохранение данных в сеансе
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['username'] = $row['username'];

			// Показывает, что срок действия учетной записи пользователя не истек
			if ($row['expired'] === 1) $_SESSION['user_not_expired'] = true;
			
		} else { // корректный адрес электронной почты, неверный пароль
			$login_errors['login'] = 'Адрес электронной почты и пароль не соответствуют адресу и паролю, которые хранятся в файле.';
		}
	
	} else { // Сравнение не выполнено (технически неверен только адрес электронной почты)
		$login_errors['login'] = 'Адрес электронной почты и пароль не соответствуют адресу и паролю, которые хранятся в файле.';
	}
	
}

// Пропустить закрывающий тег PHP, чтобы избежать ошибок 'headers are sent'!