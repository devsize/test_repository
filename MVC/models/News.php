<?php

class News
{
    /**
     * Return single news item with specified id
     * @param int $id
     */
    public static function getNewsItemById($id)
    {
        // Запрос к БД
        $id = intval($id);
        if ($id) {
           /* $host = 'localhost';
            $dbname = 'mvc_site';
            $user = 'root';
            $password = '';
            $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);*/ //данный код заменяется $db = Db::getConnection() из components/Db.php
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM news WHERE id=' . $id);
//            $result->setFetchMode(PDO::FETCH_NUM); // настраиваем fetch() -> индексы будут идти в виде номеров колонок
            $result->setFetchMode(PDO::FETCH_ASSOC); // настраиваем fetch() -> индексы будут идти в виде названий колонок
            $newsItem = $result->fetch(); // по умолчанию fetch() возвращает дублиюрующиеся индексы

            return $newsItem;
        }
    }

    /**
     * Returns an array of news items
     */
    public static function getNewsList()
    {
        // Запрос к БД

        /*$host = 'localhost';
        $dbname = 'mvc_site';
        $user = 'root';
        $password = '';
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);*/ //данный код заменяется $db = Db::getConnection() из components/Db.php
        $db = Db::getConnection();
        $newsList = [];

        $result = $db->query('SELECT id, title, date, author_name, short_content, preview '
                    . 'FROM news '
                    . 'ORDER BY date DESC '
                    . 'LIMIT 10');

        $i = 0;
        while ($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['preview'] = $row['preview'];
            $i++;
        }

        return $newsList;
    }
}