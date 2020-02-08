<?php
session_start();
$answer1 = $_SESSION['answer1'];
$answer2 = $_SESSION['answer2'];
$answer3 = $_POST['answer3'];
if (!empty($answer1) && !empty($answer2) && !empty($answer3)) {
    if (($answer1 == 4) && ($answer2 == 8) && ($answer3 == 11)) {
        $message = 'Вы ответили на все вопросы правильно';
    } else {
        $message = 'Вы где-то ошиблись';
    }
} else {
    echo 'Вы не ввели какое-то из полей';
}

?>
<p><?php echo $message; ?></p>
<?php echo session_id() . '<br>'; ?>
<?php echo session_name(); ?>

