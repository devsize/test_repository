<?php
    echo "Hello Lesson_07+ <br>";
    echo "<br>";

// Lesson_07+ Task1
echo "<br />","Lesson_07+ Task1","<br />";
echo "Взять текст из готового текстового файла (из урока №6),","<br>";
echo "","<br>";
//из файла text_f.Les06.txt копируем текст в переменную $zTxt
echo "из файла text_f.Les06.txt копируем текст в переменную и выведем его","<br>";
echo "<br>";
$zTxt = file_get_contents("text_f.Les06.txt");
echo $zTxt,"<br />";
//создаем массив с нужными нам ключами,
// а для каждого ключа создаем пустой массив, в который после будут внесены номера позиций
$ara = [
    "of" => [],
    "in" => [],
    "new" => [],
    "from" => [],
    "this" => [],
    "rail splitter" => [],
    "Illinois" => [],
];
$longTxt = strlen ($zTxt);
echo "<br />", "В этом тексте всего  ", $longTxt," символов <br />";
echo "<br /> Порівнюемо кожне ключове слово послiдовно по тексту <br />";
foreach($ara as $val => $x) { //для каждого ключевого слова делаем:
    $call = substr_count($zTxt,$val); //узнаем количество ключевых слов в тексте
    if ($call > 0) { //если ключевые слова найдены (их количество >0)
       $count = $call; // врубаем счетчик для пошуку позиций вхождений ключевых слов
       $start = 0; //задаем номер первой позици для поиска
       $x = 0; //индекс в массиве ключа, под которым будет номер символа в тексте, с которого начинается совпадения ключа
       while($count > 0)  {
           $ara[$val][$x] = strpos($zTxt,$val,$start);
           $count--;
           $x++;
       }
        echo "В этом тексте количество появлений слова  \"", $val, "\" равно:  ", $call  , " <br />";
        // echo "И появляются эти слова на символах с индексом: ", $ara[$val], " <br />";
    }
    else {
        echo "<br />", "В этом тексте нет слова  ", $val," <br />";
    }
}
echo "Fin Lesson_07+ Task1 <br />";
echo "<br />";

// Lesson_07+ Task2
echo "<br />","Lesson_07+ Task2","<br>";
echo "Взять текст из предыдущей задачи <br>";
echo "Для каждого ключевого слова в тексте найти индексы символов, с которых начинаются совпадения <br>";
echo "Вывести индексы 1-ых сиволов для всех совпадений всех ключевых слов <br><br>";
//из файла text_f.Les06.txt копируем текст в переменную $zTxt
echo "из файла text_f.Les06.txt копируем текст в переменную и выведем его","<br>";
echo "<br>";
$zTxt = file_get_contents("text_f.Les06.txt");
echo $zTxt,"<br />";
/*
// do rishennja
*/
echo "Fin Lesson_07+ Task2 <br><br>";
/*
    $j=0;
    $longVal = strlen ($val);
    echo $val," - ", $longVal ,"<br />";
    for ($i=0; $i<($longTxt-$longVal); $i++) {
        //echo $zTxt[$i]," - ", $i ,"<br />";
        for ($j=0; $j < strlen($val); $j++) {
            if ($zTxt[$j] == $val[$j]) {
                $ara[$val][$j] = $i;
            }

        }
    }
*/
/*
 *
{
if (substr_count($zTxt, $val) > 0)
(strpos($zTxt,$val) <> false) {
            $val[$j] = ;


            }
 */
?>

