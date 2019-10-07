<?php
function translateString($stringToTranslate)
{
    $alfabet = [
        'а' => 'a', 'б' => 'b', 'в' => 'v',
        'г' => 'g', 'д' => 'd', 'е' => 'e',
        'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
        'и' => 'i', 'й' => 'y', 'к' => 'k',
        'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
        'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
        'е' => 'e', 'ю' => 'yu', 'я' => 'ya'
    ];

    $stringToTranslate = preg_split('/(?<!^)(?!$)/u', $stringToTranslate);
    foreach ($stringToTranslate as $key => $value) {
        $value === mb_strtoupper($value) ? $toUpper = true : $toUpper = false;
        $foundTranslation = $alfabet[mb_strtolower($value)];
        if ($foundTranslation) {
            $stringToTranslate[$key] = $toUpper ? strtoupper($foundTranslation) : $foundTranslation;
        }
    }

    return $stringToTranslate = implode($stringToTranslate);
}

echo translateString('Счастье в секундах, маленьких острых, щедрое к Детям и скупое для взрослых!');