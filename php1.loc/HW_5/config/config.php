<?php
define('DIR_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('TEMPLATES_DIR', DIR_ROOT . '/../templates/');
define('LAYOUTS_DIR', TEMPLATES_DIR . 'layouts/');
define('IMAGES_DIR', './images/');
define('GALLERY_NAME', 'gallery_img');
define('HOW_MANY_IMAGES_TO_SHOW', 4);

/* DB config */
define('HOST', 'localhost');
define('USER', 'batov_test');
define('PASS', '12345');
define('DB', 'batov_test');

require_once DIR_ROOT . "/../engine/functions.php";
require_once DIR_ROOT . "/../engine/log.php";
require_once DIR_ROOT . "/../engine/gallery.php";
require_once DIR_ROOT . "/../engine/img_edit.php";
require_once DIR_ROOT . "/../engine/db.php";