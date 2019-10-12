<?php
require_once 'classSimpleImage.php';

function resizeToBig($file) {
    $image = new SimpleImage();
    $image->load($file);
    $image->resize(800, 600);
    $image->save($file);
}

function resizeToSmall($file, $shortName) {
    $image = new SimpleImage();
    $image->load($file);
    $image->resize(150, 100);
    $image->save($file);
    addImgToDB($shortName);
}

function addImgToDB($shortName) {
    $sql = "INSERT INTO `images`(`img_name`) VALUES ('$shortName')";
    executeQuery($sql);
}