<?php
function getGallery($folder = '') {
    $pathToBigFiles = IMAGES_DIR . $folder . '/big/';
    $pathToSmallFiles = IMAGES_DIR . $folder . '/small/';
    $bigImages = array_splice(scandir($pathToBigFiles), 2);
    $smallImages = array_splice(scandir($pathToSmallFiles), 2);
    $result = [];
    foreach ($smallImages as $fileName) {
        $imgToAdd = ['smallImgName' => $pathToSmallFiles . $fileName];
        if (in_array($fileName, $bigImages)) {
            $imgToAdd['bigImgName'] = $pathToBigFiles . $fileName;
        }
        array_push($result, $imgToAdd);
    };
    return $result;
}