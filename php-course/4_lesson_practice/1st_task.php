<?php

require_once '../helpers/functions.php';

/**
 * Напишіть програму, яка виводить всі числа від 1 до 100, з двома винятками. Для чисел, які діляться на 3 без остачі,
 * потрібно вивести 'Alpha', а для чисел, що іляться на 5 (але не на 3) - 'Beta'.
 * Коли зумієтеправтде - ви її так, щоб вона виводила «Alpha & Beta» для всіх чисел, які діляться і на 3, і на 5.
 */

for ($i = 1; $i < 101; $i++) {
    if ($i % 5 === 0 && $i % 3 === 0) {
        echo '<hr>';
        debug($i . ' - Alpha & Beta');
        echo '<hr>';
    } elseif ($i % 3 === 0) {
        debug($i . ' - Alpha');
    } elseif ($i % 5 === 0) {
        debug($i . ' - Beta');
    }
}