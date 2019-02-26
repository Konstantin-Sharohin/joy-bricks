<?php
	require('includes/config.inc.php');
	require(MYSQL);

	$page_title = 'Авторизация';
	include('includes/header.html');
	if (!isset($login_errors)) $login_errors = array();
?>
<main class="outer-container">
	<div class="container">
		<div class="home-title">Авторизация пользователя</div>
		<div class="login-item">
			<form action="" method="post" class="form form-login">
				<div class="form-field">
					<label class="user" for="login-username">
						<span class="login-user">
							<i class="far fa-user"></i>
						</span>
					</label>
					<input id="login-username" type="text" class="form-input" placeholder="Логин" required>
				</div>

				<div class="form-field">
					<label class="lock" for="login-password">
						<span class="login-user">
							<i class="fas fa-key"></i>
						</span>
					</label>
					<input id="login-password" type="password" class="form-input" placeholder="Пароль" required>
				</div>
				<div class="form-field">
					<input type="submit" name="login-submit-btn" value="Вход" class="login-submit-btn">
				</div>

			</form>
		</div>
		<?php
	if (array_key_exists('login', $login_errors)) {
		echo '<div class="alert">' . $login_errors['login'] . '</div>';
	}
	echo '<span class="help"><a href="forgot_password.php">Забыли пароль?</a></span>';
?>
	</div>
</main>
<?php
	include('includes/footer.html');
?>