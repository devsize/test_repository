<?php
/** to pass array in cookie */
/*$arr = ['name' => 'Igor', 'surname' => 'Kuznetsov', 'city'=> 'Khmelnitskyi'];
$result = serialize($arr);
var_dump($result);
setcookie('arr', $result);*/
if (isset($_POST['name']) && (!empty($_POST['name']))) {
    $name = $_POST['name'];
    setcookie('name', $name, time() + 7);
} elseif (isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
} else {
    $name = 'Гость!';
}
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
<h1>index.php</h1>
<a href="page.php">Страница page.php</a><br><br>
<p>Привет <?= $name; ?></p>
<form method="post">
    <input type="text" name="name">
    <input type="submit">
</form>
</body>
</html>
