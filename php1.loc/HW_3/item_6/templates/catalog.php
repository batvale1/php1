<?php
function showCategories($categories)
{
    $result = "<ul>";

    foreach ($categories as $item) {
        if (count($item["children"])) {
            $result .= "<li><a href={$item['url']}>{$item['name']}</a>";
            $result .= showCategories($item['children']);
            $result .= "</li>";
        } else {
            $result .= "<li><a href={$item['url']}>{$item['name']}</a></li>";
        }
    }
    $result .= "</ul>";
    return $result;
}

?>

<h2>Каталог</h2>

<?= showCategories($categories) ?>

<div>
    <? foreach ($catalog as $item): ?>
        <div>
            <?=$item['name']?><br>
            Цена: <?=$item['price']?><br>
            <button>Купить</button>
            <hr>
        </div>
    <? endforeach; ?>
</div>
