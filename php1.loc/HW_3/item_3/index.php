<?php
$data = [
    'Московская область' => [
        'Москва',
        'Зеленоград',
        'Клин'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург',
        'Всеволожск',
        'Павловск',
        'Кронштадт',
    ],
    'Рязанская область' => [
        'Рязань',
        'Рыбное',
        'Заборье'
    ]
];

function showArrayElements($data, $view) {
    $result = "";
    if ($view === 'cities') {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $result .= "$key:<br>\n";
                $result .= showArrayElements($value, $view);
            } else {
                $result .= " $value,";
            };
        }
        $result = preg_replace('/\,$/', '<br>', $result);
    } else {

    }
    return $result;
}

echo showArrayElements($data, 'cities');