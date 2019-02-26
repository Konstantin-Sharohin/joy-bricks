<?php

DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'paradox');
DEFINE ('DB_NAME', 'joy-bricks');

$dbConnect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (mysqli_connect_errno()) {
    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
    exit();
}

mysqli_set_charset($dbConnect, 'utf8');

function escape_data($data, $dbConnect) {
	return mysqli_real_escape_string($dbConnect, trim($data));
}