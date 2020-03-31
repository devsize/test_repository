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
        $newsList = News::getNewsList(); // берётся статический метод с класса models/News.php

        /*echo '<pre>';
        print_r($newsList);
        echo '</pre>';*/
        require_once (ROOT . '/views/news/index.php');

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
      /*  ... function actionView($params) {  //получаем параметры в action c Router
        echo '<br>' . $params[0];
        echo '<br>' . $params[1];*/

      /*  public function actionView($category, $id) { //$category и $id(в качестве переменных) мы можем
                                                       // получить, используя функцию call_user_func_array
                                                       // из Router
        echo '<br>' . $category;
        echo '<br>' . $id;*/

        if ($id) {
            $newsItem = News::getNewsItemById($id); // берётся с models/News.php

            /*echo '<pre>';
            print_r($newsItem);
            echo '</pre>';*/
        }
        require_once (ROOT . '/views/news/view.php');

        return true;
    }
}