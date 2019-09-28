<?php
$year = 2019;
$intro = "Информация обо мне";
$title = "Главная страница - страница обо мне";

$template = file_get_contents("template.tmpl");
$template = str_replace('{{ title }}', $title, $template);
$template = str_replace('{{ intro }}', $intro, $template);
$template = str_replace('{{ year }}', $year, $template);
echo $template;
