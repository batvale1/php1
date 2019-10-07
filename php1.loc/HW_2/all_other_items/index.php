<?php
/**
 * Cre$ated $by PhpStorm.
 * User: $b$atov_$a$b
 * D$ate: 02.10.2019
 * Time: 11:20
 */
//Пункт 1
$a = -4;
$b = 2;

$result = '';
if (!isset($a) || !isset($b)) {
    $result = "Необходимо ввести значения переменных! Код далее будет исполнен некорректно";
} else if ($a >= 0 && $b >= 0) {
    $result = "b - a: " . ($b - $a);
} else if ($a < 0 && $b < 0) {
    $result = "a * b: " . $a * $b;
} else if ($a * $b < 0) {
    $result = "a + b: " . ($a + $b);
}
echo $result.PHP_EOL;
//Пункт 2
//Задаем рандом целочисленный в промежетке 0 и 15
$varSwitch = rand(0,15);

//Я бы рекурсией сделал вывод
function consoleNumbers($number) {
    if ($number >= 0 && $number <= 15) {
        echo $number.PHP_EOL;
        $number++;
        consoleNumbers($number);
    }
}


echo "Вывод числа {$varSwitch} до 15 рекурсией:".PHP_EOL;
echo consoleNumbers($varSwitch).PHP_EOL;

//А вот так в учебных целях просто через Switch

echo "Вывод числа {$varSwitch} до 15 через Switch:".PHP_EOL;
switch ($varSwitch) {
    case 0: echo "0".PHP_EOL;
    case 1: echo "1".PHP_EOL;
    case 2: echo "2".PHP_EOL;
    case 3: echo "3".PHP_EOL;
    case 4: echo "4".PHP_EOL;
    case 5: echo "5".PHP_EOL;
    case 6: echo "6".PHP_EOL;
    case 7: echo "7".PHP_EOL;
    case 8: echo "8".PHP_EOL;
    case 9: echo "9".PHP_EOL;
    case 10: echo "10".PHP_EOL;
    case 11: echo "11".PHP_EOL;
    case 12: echo "12".PHP_EOL;
    case 13: echo "13".PHP_EOL;
    case 14: echo "14".PHP_EOL;
    case 15: echo "15".PHP_EOL;
}

//Пункт 3. 4 вида операций
echo "4 вида операций:".PHP_EOL;
function fSummation($x = 0,$y = 0) {
    return $x + $y;
}

function fMultiplication($x = 0,$y = 0) {
    return $x * $y;
}

function fSubtraction($x = 0,$y = 0) {
    return ($x - $y);
}

function fDivision($x = 0,$y = 0) {
    return (is_numeric($y) && $y != 0) ? $x / $y : "It's isn't allowed to divide by zero or NaN";
}

echo "Результат арифмитических операций с переменными a и b (значения  {$a} и {$b}. Сложение, умножение, вычитание, деление соответственно:".PHP_EOL;
echo fSummation($a, $b).PHP_EOL;
echo fMultiplication($a, $b).PHP_EOL;
echo fSubtraction($a, $b).PHP_EOL;
echo fDivision($a, $b).PHP_EOL;

//Пункт 4. Организация функции мат. расчетов.
echo "Организация функции мат. расчетов:".PHP_EOL;

function mathOperation($arg1, $arg2, $operation) {
    if (!is_numeric($arg1) || !is_numeric($arg2)) {
        return "The parameters have to be numbers.";
    }
    else {
        switch ($operation) {
            case "Summation":
                return fSummation($arg1, $arg2);
            case "Multiplication":
                return fMultiplication($arg1, $arg2);
            case "Subtraction":
                return fSubtraction($arg1, $arg2);
            case "Division":
                return fDivision($arg1, $arg2);
            default:
                return "The calculation can't be done. Pls, check the operation type";
        }
    }
}

echo mathOperation("omg", 1, "Division").PHP_EOL;
echo mathOperation(2, 3, "gg wp").PHP_EOL;
echo mathOperation(2, 3, "Multiplication").PHP_EOL;

//Пункт 6. Возведение в степень
echo "Возведение в степень:".PHP_EOL;

function power($val, $pow) {
    $pow = $pow < 0 ? $pow = 0 : $pow; //заглушка на необработку отрицательных степеней.
    if ($pow == 0) {
        if ($val >= 0) {
            return 1;
        } else {
            return -1;
        };
    }
    if ($pow == 1) {
        return $val;
    } else {
        return $val * power($val, $pow - 1);
    }
};

echo power(3, 3).PHP_EOL;
echo power(3, 1).PHP_EOL;
echo power(3, 0).PHP_EOL;
echo power(3, -2).PHP_EOL;

//Пункт 7. Возврат времени.
echo "Текущее время: ".PHP_EOL;
function getCurrentTime() {
    $result = "";
    $curHour = date('H');
    $curMinute = date("i");
    echo $curHour.PHP_EOL;
    echo $curMinute.PHP_EOL;

    switch (($curHour >= 20) ? $curHour % 10 : $curHour) {
        case 1: $result .= $curHour . ' час '; break;
        case 2: $result .= $curHour . ' часа '; break;
        case 3: $result .= $curHour . ' часа '; break;
        case 4: $result .= $curHour . ' часа '; break;
        default: $result .= $curHour . ' часов ';
    }

    switch (($curMinute >= 20) ? $curMinute % 10 : $curMinute) {
        case 1: $result .= $curMinute . ' минута'; break;
        case 2: $result .= $curMinute . ' минуты'; break;
        case 3: $result .= $curMinute . ' минуты'; break;
        case 4: $result .= $curMinute . ' минуты'; break;
        default: $result .= $curMinute . ' минут';
    }

    return "Текущее время: {$result}".PHP_EOL;
}

echo getCurrentTime();

