<?php
	if (!isset($login_errors)) $login_errors = array();
 	require('form_functions.inc.php');
?>

<form action="index.php" method="post" accept-charset="utf-8">
	<fieldset>
		<legend>Вход</legend>
		<?php
			if (array_key_exists('login', $login_errors)) {
				echo '<div class="alert">' . $login_errors['login'] . '</div>';
			}
			create_form_input('email', 'email', '', $login_errors, array('placeholder'=>'Адрес электронной почты'));
			create_form_input('pass', 'password', '', $login_errors, array('placeholder'=>'Пароль'));
			echo '<span class="help-block"><a href="forgot_password.php">Забыли пароль?</a></span>';
		?>
		<button type="submit" class="btn btn-default">Вход &rarr;</button>
	</fieldset>
</form>