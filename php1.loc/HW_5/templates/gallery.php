<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <? foreach ($gallery['data'] as $value): ?>
            <div class="gallery-img-wrap">
                <a href="/detail_img?img_id=<?= $value['id'] ?>"><img src="<?= IMAGES_DIR . GALLERY_NAME . '/small/' . $value['img_name'] ?>" width="150" height="100" /></a>
                <p class="likes">&#128065;<?= $value['views'] ?></p>
            </div>
        <? endforeach; ?>
    </div>
    <br>
    <? for ($i = 0; $i <= (ceil($gallery['numberOfImages'] / HOW_MANY_IMAGES_TO_SHOW) - 1); $i++ ) : ?>
        <a href="/gallery?navpage=<?= $i ?>" style="cursor: pointer; background-color: grey"> <?= $i + 1 ?></a>
    <? endfor; ?>
    <br>
    <br>
    <form name="upload" action="upload_img.php" method="POST" ENCTYPE="multipart/form-data">
        Select the file to upload: <input type="file" name="userfile">
        <input type="submit" name="upload" value="upload">
    </form>
</div>