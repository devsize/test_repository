<?php

include_once ROOT . '/models/News.php';

class NewsController
{
    /**
     * Return list of news
     * @return bool
     */
    public function actionIndex()
    {
        $newsList = [];
        $newsList = News::getNewsList();

        echo '<pre>';
        print_r($newsList);
        echo '</pre>';

        return true;
    }

    /**
     * Return one news
     * @param $category
     * @param $id
     * @return bool
     */
    public function actionView($id)
    {
//        ... function actionView($params) {
//        echo '<br>' . $params[0];
//        echo '<br>' . $params[1];
        if ($id) {
            $newsItem = News::getNewsItemById($id);

            echo '<pre>';
            print_r($newsItem);
            echo '</pre>';
        }


        return true;
    }
}