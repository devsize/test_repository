<?php

require_once '../helpers/functions.php';

/**
 * '/pattern/i'
 */

$someString = 'Shoulda Coulda Woulda & 3 TIMES!';
$pattern = '/(\s[\d]+\s)/i';
preg_match($pattern, $someString, $matches);
debug([
    'input_string' => $someString,
    'pattern' => $pattern,
    'matches' => $matches
]);
