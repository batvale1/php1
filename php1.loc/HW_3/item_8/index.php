<?php
// Делал для просмотра в браузере (в консоли бы не юзал br поставил бы просто PHP_EOL)
$data = [
    'Московская область' => [
        'Москва',
        'Зеленоград',
        'Клин'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург',
        'Всеволожск',
        'Кронштадт',
        'Павловск',
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
                $cities = showArrayElements($value, $view);
                if ($cities) {
                    $result .= "$key:<br>\n";
                    $result .= $cities;
                }
            } else {
                if (preg_match('/^К/ui', $value)) {
                    $result .= " $value,";
                }
            };
        }
        $result = preg_replace('/\,$/', '<br>', $result);
    } else {

    }
    return $result;
}

echo showArrayElements($data, 'cities');