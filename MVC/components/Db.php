<?php


class Db
{
    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']};charset={$params['charset']}";


        /*$opt - это массив - чрезвычайно полезная, как уже говорилось выше, штука. Самое главное - режим выдачи ошибок надо задавать только в виде исключений.
- Во-первых, потому что во всех остальных режимах PDO не сообщает об ошибке ничего внятного,
- во-вторых, потому что исключение всегда содержит в себе незаменимый stack trace,
- в-третьих - исключения чрезвычайно удобно обрабатывать.

Плюс очень удобно задать FETCH_MODE по умолчанию, чтобы не писать его в КАЖДОМ запросе, как это очень любят делать прилежные хомячки.
Также здесь можно задавать режим pconnect-а, эмуляции подготовленных выражений и много других страшных слов.*/
        $opt = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        $db = new PDO($dsn, $params['user'], $params['password'], $opt);

        return $db;
    }
}