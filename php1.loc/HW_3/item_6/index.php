<?php
define('TEMPLATES_DIR', './templates/');
define('LAYOUTS_DIR', 'layouts/');
define('COMPONENTS_DIR', './components');


if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'index';
}

$params = ['login' => 'admin'];
switch ($page) {
    case 'index':
        $params['name'] = 'Клен';
        break;
    case 'catalog':
        $params['catalog'] = [
            [
                'name' => 'Пицца',
                'price' => 24
            ],
            [
                'name' => 'Чай',
                'price' => 1
            ],
            [
                'name' => 'Яблоко',
                'price' => 12
            ],
        ];
        $params['components'] = [
            'menu_horizontal',
        ];
        $params['categories'] = [
            [
                'name' => 'Акция',
                'url' => '#',
                'children' => [],
            ],
            [
                'name' => 'Популярное',
                'url' => '#',
                'children' => [],
            ],
            [
                'name' => 'Супы',
                'url' => '#',
                'children' => [],
            ],
            [
                'name' => 'Комбо-обеды',
                'url' => '#',
                'children' => [],
            ],
            [
                'name' => 'Роллы',
                'url' => '#',
                'children' => [
                    [
                        'name' => 'Собери свой сет',
                        'url' => '#',
                        'children' => [
                            [
                                'name' => 'Горячие',
                                'url' => '#',
                                'children' => []
                            ],
                            [
                                'name' => 'Классические',
                                'url' => '#',
                                'children' => [],
                            ]
                        ],
                    ],
                    [
                        'name' => 'Теплые и запеченные',
                        'url' => '#',
                        'children' => [],
                    ],
                    [
                        'name' => 'Сеты',
                        'url' => '#',
                        'children' => [],
                    ]
                ],
            ],
            [
                'name' => 'Дим-самы',
                'url' => '#',
                'children' => [
                    [
                        'name' => 'В рисовом тесте',
                        'url' => '#',
                        'children' => [],
                    ],
                    [
                        'name' => 'В пшеничном тесте',
                        'url' => '#',
                        'children' => [],
                    ],
                    [
                        'name' => 'Наборы',
                        'url' => '#',
                        'children' => [],
                    ],
                    [
                        'name' => 'Сеты',
                        'url' => '#',
                        'children' => [],
                    ]
                ],
            ],
        ];
        break;

        case 'apicatalog':
        $params['catalog'] = [
            [
                'name' => 'Пицца',
                'price' => 24
            ],

            [
                'name' => 'Яблоко',
                'price' => 12
            ],
        ];

        echo json_encode($params, JSON_UNESCAPED_UNICODE);
        exit;
        break;

}

echo render($page, $params);


function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . 'main', [
            'content' => renderTemplate($page, $params),
            'menu' => renderTemplate('menu')
        ]
    );
}


function renderTemplate($page, $params = [])
{
    ob_start();

    if (!is_null($params))
        extract($params);

    $fileName = TEMPLATES_DIR . $page . ".php";

    if (file_exists($fileName)) {
        include $fileName;
    } else {
        Die("Такой страницы не существует. 404");
    }

    return ob_get_clean();
}