<?php

require_once 'data.php';

foreach ($publications as $publication) {
    echo '<pre>';
    print_r($publication->printItem());
    echo '<pre>';
}

