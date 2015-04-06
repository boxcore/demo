<?php
$n = 1.399392E+12;
$num  = number_format($n,0,'','');

// $num  = (int)$n;
// $num = 1399392000;
$a = 9223372036854775807;
$b = 9223372036854775808;
$c = 12345678901234;
$d = 13993123E+12;
if($a==$b){
    echo PHP_INT_MAX;
    echo "\n";
    echo "$d\n";
    echo (int)$d."\n";
    echo number_format($d,0,'','')."\n";
    var_dump($d);
}
echo "$num\n";

echo date('Y-m-d H:i:s', $num);
