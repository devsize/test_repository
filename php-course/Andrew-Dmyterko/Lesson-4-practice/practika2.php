<?php
/**
 * Завдання 2
*/
/**
 * Напишіть програму, яка створює рядок, що містить решітку 8х8, в якій строки поділяються
 * символами нового рядка (можна використовувати тег "<br>"). На кожній позиції або пробіл, або #.
 * У результаті повинна вийти шахова дошка (замість пробілу використовуйте  - "&nbsp").
 *
 * Після цього зробити кількість рядків та символів у рядку змінними, щоб можна було вивести решітку,
 * наприклад: 100х100.
 *
 * # # # #
 *  # # # #
 * # # # #
 *  # # # #
 * # # # #
 *  # # # #
 * # # # #
 *  # # # #
 *
 */

$grid = '#';
$space = "&nbsp";

$x = 8;
$y = 8;

echo "<pre>";
echo "x = $x; y= $y <br><br>";

for ($i=1; $i<=$y; $i++) {

//       echo ($i%2 != 0 ? $grid : $space);

       for ($z=1; $z<=$x; $z++) {
//  Если Х - нечетное и Y                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           нечетное выводим '#' 
              echo ($i%2 != 0 ? ($z%2 == 0 ? $space : $grid) : ($z%2 == 0 ? $grid : $space));

       }

echo "<br>";

}

echo "</pre>";
?>


