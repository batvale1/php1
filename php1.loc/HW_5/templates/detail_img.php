<div class="div" style="display: flex; flex-direction: column; align-items: center">
    <img src="<?= IMAGES_DIR . GALLERY_NAME . '/big/' . $detail_img_data['img_name'] ?>" alt="image">
    <h3>Просмотров: <?= $detail_img_data['views'] ?></h3>
    <?$back = $_SERVER["HTTP_REFERER"];?>
    <input style="padding: 10px; margin-top: 20px; font-weight: bold" type="button" value="Назад" onclick="location='<?php echo $back ?>' "/>
</div>