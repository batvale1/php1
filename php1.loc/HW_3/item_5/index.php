<?php
function my_strReplace($str) {
    return preg_replace('/\s/','_', $str);
}

echo my_strReplace("Тестов Тест Тестович");