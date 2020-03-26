<?php
//format: dd-mm-yyyy
//$string = '11-11-2015';
//
//$pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
//
//$replacement = 'Год $3, месяц $2, день $1';
//
//echo preg_replace($pattern, $replacement, $string);
//echo '<br>';

//Month: 11, Day: 21, Year: 2015

/*$string = '21-11-2015';
$pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';

$replacement = 'Month: $2, Day: $1, Year: $3';
echo preg_replace($pattern, $replacement, $string);
die();*/

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once (ROOT . '/components/Router.php');

$router = new Router();
$router->run();
