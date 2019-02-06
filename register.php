<?php
require('includes/config.inc.php');
require(MYSQL);

$page_title = 'Регистрация';
include('includes/header.html');

$reg_errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	if (preg_match('/^[A-Za-zА-Яа-я \'.-]{2,45}$/i', $_POST['first_name'])) {
		$firstName = escape_data($_POST['first_name'], $dbConnect);
	} else {
		$reg_errors['first_name'] = 'Укажите свое имя';
	};

	if (preg_match('/^[A-Za-zА-Яа-я \'.-]{2,45}$/i', $_POST['last_name'])) {
		$lastName = escape_data($_POST['last_name'], $dbConnect);
	} else {
		$reg_errors['last_name'] = 'Введите фамилию';
	};

	if (preg_match('/^[A-Za-zА-Яа-я0-9]{2,24}$/i', $_POST['username'])) {
		$userName = escape_data($_POST['username'], $dbConnect);
	} else {
		$reg_errors['username'] = 'Введите логин, используя только буквы и цифры';
	};

	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === $_POST['email']) {
		$email = escape_data($_POST['email'], $dbConnect);
	} else {
		$reg_errors['email'] = 'Укажите корректный адрес электронной почты';
	};

	if (preg_match('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,}$/', $_POST['pass1']) ) {
		if ($_POST['pass1'] === $_POST['pass2']) {
			$password = $_POST['pass1'];
		} else {
			$reg_errors['pass2'] = 'Пароли не совпадают';
		}
	} else {
		$reg_errors['pass1'] = 'Введите корректный пароль';
	};

	if (empty($reg_errors)) {
		$query = "SELECT email, username FROM users WHERE email='$email' OR username='$userName'";
		$request = mysqli_query($dbConnect, $query);

		// Количество возвращенных строк
		$rows = mysqli_num_rows($request);

		if ($rows === 0) {
			 $query = "INSERT INTO users (username, email, pass, first_name, last_name, date_expires) VALUES ('$userName', '$email', '"  .  password_hash($password, PASSWORD_BCRYPT) .  "', '$firstName', '$lastName', ADDDATE( NOW(), INTERVAL 1 MONTH) )";
			$request = mysqli_query($dbConnect, $query);

			if (mysqli_affected_rows($dbConnect) === 1) {
				 $uid = mysqli_insert_id($dbConnect);
				 $_SESSION['reg_user_id']  = $uid;
				 echo '<div class="success"><h3>Спасибо за регистрацию!</h3><p>Чтобы завершить этот процесс, щелкните на отображенной внизу кнопке, чтобы оплатить доступ к сайту с помощью PayPal. Стоимость доступа составляет 10 долларов США по текущему курсу. <strong>Примечание. После завершения платежа в PayPal щелкните на соответствующей кнопке, чтобы вернуться на сайт.</strong></p></div>';
				 echo '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="AEM2YK8MV95BG">
					<input type="image" src="https://www.sandbox.paypal.com/ru_RU/RU/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal — безопасный и легкий способ оплаты в сети Интернет">
					<img alt="" border="0" src="https://www.sandbox.paypal.com/ru_RU/i/scr/pixel.gif" width="1" height="1"></form>';

				$body = "Спасибо за регистрацию.\n\n";
				mail($_POST['email'], 'Подтверждение регистрации', $body, 'От: admin@joy-bricks.com');

				include('includes/footer.html');
				exit();
			} else {
				trigger_error('Регистрация не завершена из-за системной ошибки. Приносим извинения за доставленные неудобства. Эта проблема будет устранена в ближайшее время');
			}
		} else {
			if ($rows === 2 || $rows === 1) {
				$reply = 'Этот адрес электронной почты или имя пользователя уже зарегистрированы. Попробуйте воспользоваться другим именем пользователя. Если вы забыли пароль, щелкните на отображенной слева ссылке, чтобы получить новый пароль.';
				$reg_errors['email'] = $reply;
				$reg_errors['username'] = $reply;
			}
		}
	}
}
require_once('includes/form_functions.inc.php');
?>

<div class="mainContent">
	<h1>Регистрация</h1>
	<p>
		Доступ к контенту сайта на год за 10 долларов могут получить зарегистрированные пользователи. Для выполнения регистрации воспользуйтесь следующей формой. <strong>Примечание. Обязательно нужно ввести данные во все поля.</strong> После завершения ввода данных в поля формы вы сможете воспользоваться безопасным способом оплаты годовой подписки через <a href="http://www.paypal.com">PayPal</a>.
	</p>
	<form action="register.php" method="post" accept-charset="utf-8">
		<?php
			create_form_input('first_name', 'text', 'Имя', $reg_errors);
			create_form_input('last_name', 'text', 'Фамилия', $reg_errors);
			create_form_input('username', 'text', 'Логин', $reg_errors);
				echo '<span class="help-block">Допускаются только буквы и цифры.</span>';
			create_form_input('email', 'email', 'Адрес электронной почты', $reg_errors);
			create_form_input('pass1', 'password', 'Пароль', $reg_errors);
				echo '<span class="help-block">Минимальная длина - 6 символов (пароль должен включать минимум одну букву в верхнем регистре, одну букву в нижнем регистре и одну цифру).</span>';
			create_form_input('pass2', 'password', 'Подтверждение пароля', $reg_errors);
		?>
		<input type="submit" name="submit_button" value="Далее &rarr;" id="submit_button" class="submit-btn" />
	</form>
	<br>
</div>

<?php
	include('includes/footer.html');
?>