<?php
define ('DB_HOST', 'db21.freehost.com.ua');
define ('DB_USER', 'joybricks_DB');
define ('DB_PASSWORD', 'whg6MHbYO');
define ('DB_NAME', 'joybricks_db');

$dbConnect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

mysqli_set_charset($dbConnect, 'utf8');