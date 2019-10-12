<?php
function getGallery($groupToShow)
{
    $sql = "SELECT IFNULL(views.views,0) AS views, images.id, images.img_name 
            FROM batov_test.images images
            LEFT JOIN 
            (SELECT COUNT(ip) AS views, img_id FROM batov_test.img_views views GROUP BY views.img_id ) views 
            ON images.id = views.img_id ORDER BY views DESC, id";
    $arrayOfImages = getAssocResult($sql);
    $numberOfImages = count($arrayOfImages);
    $arrayToReturn = array_slice($arrayOfImages, $groupToShow * HOW_MANY_IMAGES_TO_SHOW, HOW_MANY_IMAGES_TO_SHOW);

    $dataToReturn = [
        'data' => $arrayToReturn,
        'numberOfImages' => $numberOfImages,
    ];

    return $dataToReturn;
}

function getGalleryImg($img_id)
{
    $sql = "SELECT IFNULL(views.views,0) AS views, images.id, images.img_name 
            FROM batov_test.images images
            LEFT JOIN 
            (SELECT COUNT(ip) AS views, img_id FROM batov_test.img_views views GROUP BY views.img_id ) views 
            ON images.id = views.img_id WHERE id = $img_id";
    $arrayOfImages = getAssocResult($sql);
    $arrayOfImages['views'] = getImgViews($img_id);
    return $arrayOfImages[0];
}

function getImgViews($img_id) {
    $sql = "SELECT views.views 
            FROM batov_test.images images
            RIGHT JOIN 
            (SELECT COUNT(ip) AS views, img_id FROM batov_test.img_views views GROUP BY views.img_id ) views 
            ON images.id = views.img_id WHERE images.id = $img_id";
    $result = getAssocResult($sql);
    if ($result) {
        return $result[0]['views'];
    } else {
        return 0;
    };
}

function incrementViews($img_id) {
    if (!hasBeenViewed($_SERVER['REMOTE_ADDR'], $img_id)) {
        $sql = "UPDATE `img_views` SET views=views+1  WHERE img_id=$img_id";
        executeQuery($sql);
    }
}

function hasBeenViewed($ip, $img_id) {
    $sql = "SELECT views.id FROM batov_test.img_views views LEFT JOIN batov_test.images images ON views.img_id = images.id WHERE images.id = $img_id AND views.ip = '$ip'";
    $arrayOfImages = getAssocResult($sql);
    if (!$arrayOfImages) {
        $sql = "INSERT INTO `img_views`(`img_id`, `ip`) VALUES ($img_id,'$ip')";
        executeQuery($sql);
        return true;
    } else {
        $sql = "UPDATE `img_views` SET ip = '$ip' WHERE img_id=$img_id";
        executeQuery($sql);
        return false;
    }
}