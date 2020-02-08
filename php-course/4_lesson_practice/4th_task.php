<?php

require_once '../helpers/functions.php';

/**
 * У користувача онлайн сервісу є 2000 у.о., проімітуйте здійснення покупок, використовуючи рандомні значення rand(),
 * при цьому потрібно виводити залишок на рахунку; у разі недостатньої суми на рахунку виведіть повідмлення.
 * Використовувати Do-While або While
 */

$balance = 2000;

while ($balance >= 0) {
    $balanceBefore = $balance;
    $sumToSpend = rand(1, 500);
    if ($balanceBefore  >= $sumToSpend) {
        $balance -= $sumToSpend;
        debug('Баланс перед покупкою: $' . $balanceBefore);
        debug('Ви витратили: $' . ($balanceBefore - $balance));
        debug('Ваш поточний баланс: $' . $balance);
        echo '<hr>';
    } else {
        debug('На Вашому рахунку недостатньо коштів!');
        debug('Сума покупки: $' . $sumToSpend);
        debug('Ваш поточний баланс: $' . $balanceBefore);
        break;
    }
}

