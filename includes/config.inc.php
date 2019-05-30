<?php
if (!defined('LIVE')) define ('LIVE', false);
define ('CONTACT_EMAIL', 'info@joy-bricks.co.ua');
define ('BASE_URI', 'C:/xampp/htdocs/joy-bricks/');
define ('BASE_URL', 'localhost/joy-bricks/');
//session_start();

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
};

set_error_handler('cust_error_handler');