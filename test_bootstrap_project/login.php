<?php

require_once './helpers/functions.php';

login();

$sourceFile = './source/login.json';
$sourceData = getSourceData($sourceFile);

$header = getHeader($sourceData);
$mainContent = getMainContent($sourceData, 'login/login');
$footer = getFooter($sourceData);

echo $header;
echo $mainContent;
echo $footer;