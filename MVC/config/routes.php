<?php

return [
    //правила для просмотра одной новости должны распологаться вверху
    //т.к. наш Router по очереди идёт по массиву,
    'news/([0-9]+)' => 'news/view/$1',
    'news' => 'news/index' // actionIndex in NewsController

//    'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2', ([a-z]+) category, ([0-9]+) news id
//    'news/([0-9]+)' => 'news/view/$1/$2',


//    'products' => 'product/list' // actionLIst in ProductController
];