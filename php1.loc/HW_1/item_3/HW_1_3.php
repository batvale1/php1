<?php
$a = 5;
$b = '05';
var_dump($a == $b);         // Почему true? Потому что "а" остается как есть, а "b" приводится к числу, а поскольку сравнение происходит без сравнения типов, то и получается true.
var_dump((int)'012345');     // Почему 12345? //Потому что происходит преобразования к целочисленному типу данных и лидирующий ноль лишний в таких значениях.
var_dump((float)123.0 === (int)123.0); // Почему false? ПОтому что различаются типы значений, а сравнение происходит со сравнением типов значений наряду с самими значениями, а типы разные - дробрый и целочисленный.
var_dump((int)0 === (int)'hello, world'); // Почему true? Потому что второе значение преобразуется в целочисленное значение. А поскольку слева у строки нет ни одной значащей цифры, то это дает 0.
