<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";

$blacklist = array(".php", ".phtml", ".php3", ".php4");
foreach ($blacklist as $item) {
    if (preg_match("/$item\$/i", $_FILES['userfile']['name'])) {
        echo "We do not allow uploading PHP files\n";
        exit;
    }
}

$uploadDirBigFile = IMAGES_DIR . GALLERY_NAME . '/big/';
$uploadBigFile = $uploadDirBigFile . basename($_FILES['userfile']['name']);
$uploadDirSmallFile = IMAGES_DIR . GALLERY_NAME . '/small/';
$uploadSmallFile = $uploadDirSmallFile . basename($_FILES['userfile']['name']);
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadBigFile)) {
    resizeToBig($uploadBigFile);
    if (copy($uploadBigFile, $uploadSmallFile)) {
        resizeToSmall($uploadSmallFile, basename($_FILES['userfile']['name']));
    } else {
        var_dump('hmmm...');
    };
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
} else {
    echo "File uploading failed.\n";
}