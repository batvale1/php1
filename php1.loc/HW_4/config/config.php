<?php
define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('TEMPLATES_DIR', DIR_ROOT . '/../templates/');
define('LAYOUTS_DIR', TEMPLATES_DIR . 'layouts/');
define('IMAGES_DIR', 'images/');

require_once DIR_ROOT . "/../engine/functions.php";
require_once DIR_ROOT . "/../engine/log.php";
require_once DIR_ROOT . "/../engine/getting_data.php";