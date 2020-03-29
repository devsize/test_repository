<?php
$a = 5;
$b = $a;

$str = '$c = $a + $b;';
eval($str);
//die("$c");

$a = 10;
$b = 20;

//echo $a, $b;

echo '<pre>';
print_r($_SERVER);
echo '</pre>';