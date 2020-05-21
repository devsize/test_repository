<?php

require_once './helpers/functions.php';

$sourceFile = './source/articles.json';
$sourceData = getSourceData($sourceFile);

$header = getHeader($sourceData);
$mainContent = getMainContent($sourceData, 'articles/article');
$footer = getFooter($sourceData);

echo $header;
echo $mainContent;
echo $footer;