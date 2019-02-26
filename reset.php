<?php

// Этот сценарий применяется для изменения существующего пароля после выполнения сброса пользователем
// Этот сценарий создан в главе 12.

// Чтобы контролировать отображение сообщений об ошибках, перед выполнением кода PHP требуется подключение файла конфигурации
require('includes/config.inc.php');
// Файл конфигурации также открывает сеанс

// Выполняется подключение к базе данных
require(MYSQL);

// Подключение файла заголовка
$page_title = 'Сброс пароля';
include('includes/header.html');

// Этот массив применяется для хранения ошибок, возникающих при сбросе пароля
$reset_error = '';

// Этот массив используется для хранения ошибок, связанных с паролями
$pass_errors = array();

if (isset($_GET['t']) && (strlen($_GET['t']) === 64) ) { // первый доступ
	$token = $_GET['t'];

	// Выборка идентификатора пользователя
	$q = 'SELECT user_id FROM access_tokens WHERE token=? AND date_expires > NOW()';
	$stmt = mysqli_prepare($dbc, $q);
	mysqli_stmt_bind_param($stmt, 's', $token);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	if (mysqli_stmt_num_rows($stmt) === 1) {
		mysqli_stmt_bind_result($stmt, $user_id);
		mysqli_stmt_fetch($stmt);

		// Создание идентификатора нового сеанса
		session_regenerate_id(true);
		$_SESSION['user_id'] = $user_id;

		// Удаление токена
		$q = 'DELETE FROM access_tokens WHERE token=?';
		$stmt = mysqli_prepare($dbc, $q);
		mysqli_stmt_bind_param($stmt, 's', $token);
		mysqli_stmt_execute($stmt);

	} else {
		$reset_error = 'Текущий токен не соответствует токену для файла либо время, выделенное для доступа, истекло. Пожалуйста, повторно передайте данные формы "Восстановление пароля".';
	}
	mysqli_stmt_close($stmt);

} else { // токен отсутствует
// $reset_error = 'Текущий токен не соответствует токену для файла либо время, выделенное для доступа, истекло. Пожалуйста, повторно передайте данные формы Забыли пароль?';

 $reset_error = 'Ошибка при доступе к странице.';
}

// В запросе POST обрабатывается передача данных формы
if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_SESSION['user_id'])) {

	// Выберите ОК для изменения пароля
	$reset_error = '';

	// Проверка пароля и сравнение с подтвержденным паролем
	if (preg_match('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,}$/', $_POST['password']) ) {
		if ($_POST['password'] == $_POST['password-confirm']) {
			$password = $_POST['password'];
		} else {
			$pass_errors['password-confirm'] = 'Ваш пароль не соответствует подтвержденному паролю!';
		}
	} else {
		$pass_errors['password'] = 'Пожалуйста, введите корректный пароль!';
	}

	if (empty($pass_errors)) { // если все OK

		// Определение запроса
		$q = 'UPDATE users SET pass=? WHERE id=? LIMIT 1';
		$stmt = mysqli_prepare($dbc, $q);
		mysqli_stmt_bind_param($stmt, 'si', $pass, $_SESSION['user_id']);
		$pass = password_hash($password, PASSWORD_BCRYPT);
		mysqli_stmt_execute($stmt);

		if (mysqli_stmt_affected_rows($stmt) === 1) {

			// Отправка сообщения электронной почты (при необходимости)

			// Дайте пользователю знать, что пароль был изменен
			echo '<h1>Ваш пароль был изменен.</h1>';
			include('includes/footer.html'); // включение HTML-футера
			exit();

		} else { // Если возникли проблемы

			trigger_error('Пароль не может быть изменен из-за системной ошибки. Приносим извинения за доставленные неудобства.');

		}

	} // завершение условного блока empty($pass_errors)

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$reset_error = 'Ошибка при доступе к странице.';
} // конец условного выражения, применяемого для передачи формы

// Для безопасного изменения пароля отображите форму
if (empty($reset_error)) {

	// Требуется сценарий form functions, который определяет функцию create_form_input()
	// Этот файл уже был включен с помощью заголовка
	echo '<h1>Изменение вашего пароля</h1>
	<p>Измените пароль с помощью следующей формы.</p>
	<form action="reset.php" method="post" accept-charset="utf-8">';

	create_form_input('pass1', 'password', 'Пароль', $pass_errors);



	create_form_input('pass2', 'password', 'Подтвердить пароль', $pass_errors);

	echo '<input type="submit" name="submit_button" value="Изменить &rarr;" id="submit_button" class="btn" />
</form>';

} else {
	echo '<div class="alert alert-danger">' . $reset_error . '</div>';
}

include('includes/footer.html');
?>