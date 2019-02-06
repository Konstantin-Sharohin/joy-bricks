<?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'paradox');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'ecommerce1');

$dbConnect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

mysqli_set_charset($dbConnect, 'utf8');

function escape_data($data, $dbConnect) {
	if (get_magic_quotes_gpc())
		$data = stripslashes($data);
	return mysqli_real_escape_string($dbConnect, trim($data));
}