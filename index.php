<?php

define('BASEPATH', dirname($_SERVER['SCRIPT_NAME']));

$uriParts = explode("?", $_SERVER['REQUEST_URI']);
$uri = array_shift($uriParts);
$route = "/" . trim(str_replace(BASEPATH, "", $uri), "/");

$hxRequest = !empty($_SERVER['HTTP_HX_REQUEST']);


//------------------------------------------------

function prd($data) {
	header("Content-Type: text/plain");
	print_r($data);
	die();
}

function load($name, $data = array()) {
	extract($data);
	ob_start();
	require __DIR__ . "/app/views/$name.php";
	return ob_get_clean();
}

//------------------------------------------------

switch ($route) {
	case '/':
		$content = load('home', [
			'clicks' => 0,
			'buttonText' => 'CLICK ME',
		]);
		break;

	case '/hello':
		$clicks = intval($_GET['clicks']) + 1;
		$content = load('button', [
			'clicks' => $clicks,
			'buttonText' => 'CLICKED ' . $clicks,
		]);
		break;

	case '/about':
		$content = load('about');
		break;

	default:
		http_response_code(404);
		$content = load('404');
}

if ($hxRequest) {
	echo $content;
} else {
	require __DIR__. '/app/layout.php';
}
