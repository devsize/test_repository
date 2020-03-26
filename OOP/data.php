<?php
require_once 'classes.php';

$publications = [];

//connect to database
$connection = mysqli_connect('127.0.0.1', 'root', '', 'test');
if (mysqli_connect_errno()) {
    echo 'Failed connection to MYSQL ' . mysqli_connect_error();
}

$query = mysqli_query($connection,"SELECT * FROM publication");

while ($row = mysqli_fetch_array($query)) {
    //на место $row['type'] подставляется Название из БД с поля type
    //а ($row) - это конструктор(__construct()), в который мы передаём значения всей строки
    $publications[] = new $row['type']($row);
}