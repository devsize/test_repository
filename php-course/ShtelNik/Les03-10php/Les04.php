<?php
echo "Hello Lesson_04 HomeWork <br>";
echo "<br>";
//Lesson4   conditional statements
echo "Lesson_04 Task1 <br>"; //Task1
echo "Вывести на экран числа от 1 до 100, <br>";
echo "если число делится на 3, то вместо него печатаем ALFA, <br>";
echo "если число делится на 5, то вместо него печатаем BETA, <br>";
echo "если число делится на 3 и 5, то вместо него печатаем ALFA&BETA. <br>";
for ($i=1; $i<=100; $i++){
    $j=$i;
    if (($j%3===0)&&($j%5===0)) {
        echo "ALFA&BETA",  "<br />";
    }
    elseif ($j%3===0){
        echo "ALFA",  "<br />";
    }
    elseif ($j%5===0){
        echo "BETA",  "<br />";
    }
    else {
        echo $j, "<br />";
    }
}
echo "#Final Task1# <br />";
echo "<br>";

echo "Lesson_04 Task2 <br />"; //Task2
$x=8; $y=8;
for ($j=$y; $j>=1; $j--) {
    $g=$j;
    for ($i = 8; $i>=1; $i--) {
        $w=$i;
        if ((($w%2===0)&&($g%2===0))||(($w%2!==0)&&($g%2!==0))) {
            echo "X";
        }
        else {
            echo "#";
        }
    }
echo "<br>";
}
echo "#Final Task2# <br>";
echo "<br>";

echo "Lesson_04 Task3 <br>"; //Task3
echo "Создать массив чисел рандомно, ","<br>";
echo "найти Мах,Мin значения, ","<br>";
echo "вывести какие знчения повторяются и сколько раз ","<br><br>";
$longArr = 50; //rand(10,50); // создаем длину массива
echo "Create an array that has a length of ", $longArr ,"<br>";
for ($i=0;$i<$longArr;$i++) {
    $num[$i] = rand(1,20); // заполняем массив случ.числами от 1 до 20
    echo $i+1,".  ",$num[$i],"<br>"; //выводим массив чисел на экран
}
$max = max($num);
echo "Max value of the array is ", $max ,"<br>";//выводим Max значение массива
$min = min($num);
echo "Min value of the array is ", $min ,"<br>";//выводим Min значение массива
for ($i=0;$i<$longArr;$i++) { //создаем массив "К" в котором будем хранить TRUE если число повторяется
    $K[$i] = false; //по-умолчению считаем что каждое число не повторяется,а появилось лишь 1 раз
}
for ($i=0;$i<$longArr;$i++){
    if ($K[$i]==false) { //если число не встретилось больше 1 раза
        $rep=1; //включаем счетчик повторов
        for ($j=$i+1;$j<$longArr;$j++){
            if (($K[$j]==false) && ($num[$i]==$num[$j])){ // подчитываем количество повторов
                $K[$i]=TRUE;
                $K[$j]=$K[$i];
                $rep++;
            }
        }
        //для чисел которые встретились нам больше 1 раз выводим само число и количество его появлений
        if ($rep>1) {
            echo $num[$i], "-", $rep, "<br>";
        }
    }
}
echo "#Final Task3# <br />";
echo " <br>";

echo "Lesson_04 Task4<br />";
echo "Задать челу стартовую касу 2000грн.<br />";
echo "Пусть делает покупки по рандомным ценам пока еще деньги есть<br />";
echo "Вывести инфу после каждой покупки о суме покупки и остатке кассы<br />";
echo "Когда деньги закончатся, вывести сообщение<br /><br />";

echo "Lesson_04 Task4a // USE do_while <br />"; //Task4a
$kasa=2000;
echo "kasa=",$kasa,"$<br />";
do {
    $buy=rand(1,$kasa);
    $priBable=($kasa>0)&&($kasa>=$buy);
    if ($priBable) {
        echo "Pokupka na sumu:",$buy,"$<br />";
        $kasa=$kasa-$buy;
        echo "zalushok kasu=",$kasa,"$<br />";
    }
    else {
        echo "Pokupka na sumu:",$buy,"$<br />";
        echo "У тя нима бабла ЛАШАРА!!! Иди работай!<br />";
    }
} while ($priBable);
echo "<br />";

echo "Lesson_04 Task4b // USE  while <br />"; //Task4b
$kasa=2000;
echo "kasa=",$kasa,"$<br />";
while ($kasa>0){
    $buy=rand(1,$kasa);
    echo "Pokupka na sumu:",$buy,"$<br />";
    if (($kasa>=$buy)&&($kasa>0)) {
        $kasa=$kasa-$buy;
        echo "zalushok kasu=",$kasa,"$<br>";
    }
    else {
        echo "У тя нима бабла ЛАШАРА!!! Иди работай!<br />";
    }
}
echo "#Final Task4# <br>";
echo "<br>";

echo "Lesson_05 Task5 <br>"; //Task5
echo "Створіть масив з назвами усіх місяців року.
 Використовуючи цикл або цикл із switch-case виведіть номер місяця і його назву <br />";
$mns=["Jan","Feb","Mart","Apr","May","June","Jule","Aug","Sep","Okt","Nov","Dec"];
for ($i=0;$i<=count($mns)-1;$i++) {
    echo $i+1,".  ","$mns[$i]","<br>";
}
echo "#Final Task5# <br>";
echo "Final Lesson_04 <br>";
?>



