<?php
function render($page, $params = [])
{
    _log($page);
    return renderTemplate(LAYOUTS_DIR . 'main', [
            'content' => renderTemplate(TEMPLATES_DIR . $page, $params),
            'menu' => renderTemplate(TEMPLATES_DIR . 'menu')
        ]
    );
}


function renderTemplate($page, $params = [])
{
    ob_start();
    if (!is_null($params))
        extract($params);

    $fileName = $page . ".php";
    _log($fileName);
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Такой страницы не существует. 404");
    }

    return ob_get_clean();
}