<?php
function showNumbers($n, $m, $divider = 1) {
    $result = "The following numbers from {$n} to {$m} can be divided by {$divider}:<br>";
    while ($n <= $m) {
        if ($n % $divider === 0) {
            $result .= $n . " ";
        };
        $n++;
    }
    return $result;
}

echo showNumbers(0,100, 3);