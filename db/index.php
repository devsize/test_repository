<?php

$connection = mysqli_connect('localhost', 'root', '', 'test');
mysqli_set_charset($connection, 'utf8');

//check connection
//if (mysqli_connect_errno()) {
//    echo 'Connection failed' . mysqli_connect_error();
//}

//$insert = "insert into news values (null, 'cars', 'new brown car', 'new brown car was detected', 2, 3, current_timestamp, 'some preview', 0);";
//$delete = "delete from news order by date desc limit 3;";
//$update = "update news set status = 1 where id between 5 and 6;";
//$select = "select * from news where h1 between 0 and 3;";
//$queryResult = mysqli_query($connection, $insert);
//var_dump($queryResult);

//echo mysqli_affected_rows($connection);
//$count = mysqli_num_rows($queryResult);


/*if ($count) {
    while ($row = mysqli_fetch_array($queryResult)) {
        echo '<pre>';
        print_r($row);
        echo '</pre>';
    }
    $count--;
}*/
for ($i = 0; $i < 10; $i++) {
    $insert = "insert into news values (null, 'car$i', 'new car$i', 'new brown car$i was detected', $i, $i, current_timestamp, 'some preview', true);";
    $queryResult = mysqli_query($connection, $insert);
    var_dump($queryResult);
}