<?php
function showParityOfNumbers($n, $m) {
    $result = "";
    if ($n == 0) {
        $result .= "The number 0 is zero<br>";
        $n++;
    }
    do {
        if ($n & 1) {
            $result .= "The number $n is an odd number<br>";
        } else {
            $result .= "The number $n is an even number<br>";
        }
        $n++;
    }
    while ($n <= $m);

    return $result;
}

echo showParityOfNumbers(0, 10);
