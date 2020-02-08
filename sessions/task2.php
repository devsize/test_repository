<?php
session_start();
$answer1 = $_POST['answer1'];
$_SESSION['answer1'] = $answer1;
?>
<p>Вопрос 2</p>
<p>Сколько будет 4 + 4 ?</p>
<form action="task3.php" method="post">
    <input type="text" name="answer2">
    <input type="submit">
</form>