<?php

/*$names = $_FILES['files']['name'];
$links = $_FILES['files']['tmp_name'];
$sizes = $_FILES['files']['size'];
$types = $_FILES['files']['type'];

$pictures = [];
for ($i = 0; $i < count($names); $i++) {
    $pictures[$i] = [];
    $pictures[$i]['name'] = $names[$i];
    $pictures[$i]['src'] = $links[$i];
    $pictures[$i]['size'] = $sizes[$i];
    $pictures[$i]['type'] = $types[$i];
}*/
$files = $_FILES;
/*for ($j = 0; $j < count($files['files']['tmp_name']); $j++) {
    $str = $files['files']['tmp_name'][$j];
    $pattern = '/^[w]+.tmp$/i';
    $replacement = '/^.*.[jpeg]{3,4} $/i';
    $route = preg_replace($pattern, $replacement, $str);
    $files['files']['tmp_name'][$j] = $route;
}*/
$pictures = [];
for ($i = 0; $i < count($files['files']['name']); $i++) {
    $pictures[$i] = [];
    $pictures[$i]['name'] = $files['files']['name'][$i];
    $pictures[$i]['src'] = $files['files']['tmp_name'][$i];
    $pictures[$i]['size'] = $files['files']['size'][$i];
    $pictures[$i]['type'] = $files['files']['type'][$i];
}
$result = $pictures;

require_once 'template/header.php';
require 'template/main.php';
require_once 'template/footer.php';

