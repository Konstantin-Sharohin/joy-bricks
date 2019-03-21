<?php

if (!defined('LIVE')) DEFINE('LIVE', false);

DEFINE('CONTACT_EMAIL', 'info@joy-bricks.co.ua');

define ('BASE_URI', 'C:/xampp/htdocs/joy-bricks/');
define ('BASE_URL', 'localhost/joy-bricks/');
define ('MYSQL', BASE_URI . 'includes/mysql.inc.php');

session_start();

function cust_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {

	$message = "Ошибка произошла в сценарии '$e_file' в строке $e_line:\n$e_message\n";
	//$message .= "<pre>" .print_r(debug_backtrace(), true) . "</pre>\n";
	$message .= "<pre>" . print_r ($e_vars, true) . "</pre>\n";

	if (!LIVE) {
		echo '<div class="alert">' . nl2br($message) . '</div>';
	} else {
		error_log ($message, 1, CONTACT_EMAIL, 'От:info@joy-bricks.co.ua');
		if ($e_number != E_NOTICE) {
			echo '<div class="alert">Произошла системная ошибка. Приносим свои извинения за возможные неудобства.</div>';
		}
	}
	return true;
}

set_error_handler('cust_error_handler');

/*function redirect_invalid_user($check = 'user_id', $destination = 'index.php', $protocol = 'http://') {
	if (!headers_sent()) {
		if (!isset($_SESSION[$check])) {
			$url = $protocol . BASE_URL . $destination;
			header("Location: $url");
			exit();
		}
	} else {
			include_once('includes\header.html');
			trigger_error('У вас нет разрешений на доступ к этой странице. Авторизируйтесь и попробуйте еще раз.');
			include_once('includes\footer.html');
			}
}*/