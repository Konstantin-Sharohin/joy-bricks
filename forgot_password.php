<?php
require('includes/config.inc.php');

require(MYSQL);

$page_title = 'Восстановление пароля';
include('includes/header.html');

$pass_errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

		$email = $_POST['email'];

		$q = 'SELECT id FROM users WHERE email="'.  escape_data($email, $dbc) . '"';
		$r = mysqli_query($dbc, $q);

		if (mysqli_num_rows($r) === 1) {
			list($uid) = mysqli_fetch_array($r, MYSQLI_NUM);
		} else {
			$pass_errors['email'] = 'Для отправленного адреса электронной почты соответствие в файле не найдено!';
		}

	} else {
		$pass_errors['email'] = 'Пожалуйста, введите корректный адрес электронной почты!';
	}

	if (empty($pass_errors)) {
/*
		// Создание нового случайного пароля
		$p = substr(md5(uniqid(rand(), true)), 10, 15);

		// Подключение библиотеки password_compat, если требуется:
		// include('./includes/lib/password.php');

		// Обновление базы данных
		$q = "UPDATE users SET pass='" .  password_hash($p, PASSWORD_BCRYPT) . "' WHERE id=$uid LIMIT 1";
		$r = mysqli_query($dbc, $q);

		if (mysqli_affected_rows($dbc) === 1) { // если все выполняется без сбоев

			// Отправка сообщения электронной почты
			$body = "Ваш пароль, применяемый для входа на сайте, был временно изменен на '$p'. Пожалуйста, войдите на сайт с помощью этого пароля и адреса электронной почты. Затем можете изменить пароль на другой.";
			mail($_POST['email'], 'Ваш временный пароль.', $body, 'From: admin@example.com');

			// Печать сообщения и отображение футера
			echo '<h1>Ваш пароль был изменен.</h1><p>Вы получите новый временный пароль по электронной почте. Как только вы войдете с новым паролем, вы можете изменить его, щелкнув на ссылке "Изменить пароль".</p>';
			include('./includes/footer.html');
			exit(); // остановить выполнение сценария

		} else { // если сценарий выполняется со сбоями

			trigger_error('Пароль не может быть изменен из-за системной ошибки. Приносим извинения за доставленные неудобства.');

		}
*/
		$token = openssl_random_pseudo_bytes(32);
		$token = bin2hex($token);

		// Сохранение токена в базе данных
		$q = 'REPLACE INTO access_tokens (user_id, token, date_expires) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 15 MINUTE))';
		$stmt = mysqli_prepare($dbc, $q);
		mysqli_stmt_bind_param($stmt, 'is', $uid, $token);
		mysqli_stmt_execute($stmt);
		if (mysqli_stmt_affected_rows($stmt) > 0) {
			$url = 'https://' . BASE_URL . 'reset.php?t=' . $token;
			$body = 'Это сообщение электронной почты высылается в ответ на запрос сброса пароля, предназначенного для доступа к веб-сайту Joy Bricks.
			 Если Вы отправили этот запрос, щелкните на ссылке, чтобы получить доступ к своей учетной записи: ' . $url . '.' .
			 'Чтобы сбросить пароль, в течение 15 минут щелкните на ссылке. В противном случае, Вам придется снова запрашивать сброс пароля.
			Если Вы не запрашивали сброс пароля, игнорируйте это сообщение и продолжайте использовать текущий пароль.';
			mail($email, 'Сброс пароля для веб-сайта Joy Bricks', $body, 'ОТ: ' . CONTACT_EMAIL);

			echo '<h1>Сброс пароля</h1><p>Вы получили код доступа в сообщении электронной почты. Щелкните на ссылке в этом сообщении, чтобы получить доступ к сайту. После этого Вы сможете изменить пароль.</p>';
			include('includes/footer.html');
			exit(); // остановить выполнение сценария

		} else { // в случае сбоя при выполнении

			trigger_error('Из-за системной ошибки пароль изменить не удалось. Приносим извинения за возможные неудобства.');

		}

	} // завершение конструкции empty($pass_errors) IF

} // завершение основного условного выражения Submit
?><main class="outer-container">
	<div class="container">
		<div class="restore-title">Чтобы сбросить пароль, укажите Ваш адрес электронной почты</div>
		<div class="login-item">
			<form action="forgot_password.php" method="post" accept-charset="utf-8" class="form form-login">
				<div class="form-field">
					<input id="login-email" type="text" name="email" class="form-input" placeholder="Эл. почта" required>
				</div>
				<div class="form-field">
					<input id="submit_button" type="submit" name="submit_button" class="form-input" value="Сброс &rarr;"/>
				</div>
			</form>
		</div>
	</div>
</main>
<?php
	include('includes/footer.html');
?>