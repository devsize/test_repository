<?php
require_once '../helpers/functions.php';

$params = $_POST;

if (!empty($params['email'])) {
    debug($params);
    debug($_FILES);
    die();
}

require_once './header.php';
require_once './main.php';
require_once './footer.php';


