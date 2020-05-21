<?php

require_once './helpers/functions.php';

$sourceFile = './source/home.json';
$sourceData = getSourceData($sourceFile);

$header = getHeader($sourceData);
$mainContent = getMainContent($sourceData, 'home/index');
$footer = getFooter($sourceData);

echo $header;
echo $mainContent;
echo $footer;