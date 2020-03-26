<?php
$answer3 = $_POST['answer3'];
session_start();
$answer1 = $_SESSION['answer1'];
$answer2 = $_SESSION['answer2'];
if (($answer1 == 4) && ($answer2 == 6) && ($answer3 == 10)) {
    echo 'Всё правильно!' . '<br>';
} else {
    echo 'Вы где-то ошиблись!' . '<br>';
}

echo '№ вашей сессии: ' . session_id() . '<br>';
echo 'имя вашей сессии: ' . session_name() . '<br>';