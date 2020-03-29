<?php
if (isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
//    setcookie('name', ''); //to unset cookie
//    setcookie('name', '1234324', time() - 12345); //to unset cookie
} else {
    $name = 'Гость!';
}
/** to pass array in cookie */
/*$arr = $_COOKIE['arr'];
$result = unserialize($arr);
var_dump($result);*/
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index.php</title>
</head>
<body>
    <h1>page.php</h1>
    <a href="index.php">Страница index.php</a><br><br>
    <p>Привет <?= $name; ?></p>
<!--    <p>Куки были удалены!</p>-->

</body>
</html>
