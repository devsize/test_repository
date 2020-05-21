<?php

function debug($array) {
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

function test() {
  $variable = 'Local scope variable';
//  global $variable;
    debug($GLOBALS['variable']);
//  debug($variable);
}
$variable = 'Global scope variable';
test();