<?php

$data = array_merge($_GET, $_POST);

$message = sprintf(
	'[%s] %s data: %s',
	$_SERVER['REQUEST_METHOD'],
	$_SERVER['REQUEST_URI'],
	json_encode($data)
);

$fwlog = fopen(__DIR__ . sprintf('/%s.log', date('Y-m-d')), 'a+');
fwrite($fwlog, "\n" . $message, strlen($message));
fclose($fwlog);

if (isset($data['hub_challenge'])) {
	die($data['hub_challenge']);
} else {
	die('ok');
}
