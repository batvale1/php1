<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

dumpLoad();

$getParams = $_GET;
//$url_array = explode("/", $_SERVER['REQUEST_URI']);
$parsedUrl = parse_url($_SERVER['REQUEST_URI']);
$url_array = explode("/", $parsedUrl['path']);

if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
}

if ($url_array[1] == "") {
    $page = 'index';
} else {
    $page = $url_array[1];
}

$params = prepareVariables($page, $getParams);

echo render($page, $params, $params['layout']);


