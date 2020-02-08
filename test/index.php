<?php
include_once 'functions.php';

if (isset($_GET['submit'])) {
    $a = $_GET['a'];
    $b = $_GET['b'];
    $c = $_GET['c'];

    if (!empty($a) && !empty($b) && !empty($c)) {
        $result = quadratic($a, $b, $c);
        if ($result != false) {
            echo "Результат исчисления квадратного уровнения ";
            if (is_array($result)) {
                echo implode('; ', $result) . ';<br>';
            } else {
                echo $result . '<br>';
            }
        } else {
            echo 'Корней нет<br>';
        }
        echo "Форма отправлена с коефициентами a = $a, b = $b, c = $c;<br>";
    }
}

/*echo '<pre>';
print_r($_FILES);
echo '</pre>';*/

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        form {
            width: 15%;
        }

        fieldset {
            border: 1px solid #cccccc;
        }

        input {
            padding: 5px;
            border: 1px solid #cccccc;
            border-radius: 3px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<form action="index.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Квадратное уровнение</legend>
        A: <input type="text" name="a"><br>
        B: <input type="text" name="b"><br>
        C: <input type="text" name="c"><br>
        <input type="submit" value="Посчитать" name="submit">
        <!--<label>Слон: <input type="checkbox" name="animal[]" value="elephant"></label><br>
        <label>Лев: <input type="checkbox" name="animal[]" value="lion"></label><br>
        <label>Бегемот: <input type="checkbox" name="animal[]" value="hippopotamus"></label><br>
        <input type="submit" value="Посчитать" name="submit">-->
        <!--<p>Загрузка фотографий</p>
        <input type="file" name="file[]" multiple>
        <input type="submit">-->
    </fieldset>
</form>
</body>
</html>
