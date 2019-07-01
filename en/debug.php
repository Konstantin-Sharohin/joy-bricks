<?php
$log_dir='_debug_log';

if (!file_exists($log_dir)) mkdir($log_dir,0777, true);
ob_start();

print_r($selected_items);

$o = ob_get_clean();

file_put_contents($log_dir . '/' .__FUNCTION__.'.txt',$o);
?>