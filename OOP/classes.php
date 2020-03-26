<?php


class Publication
{
    public $id;
    public $title;
    public $date;
    public $short_content;
    public $content;
    public $autor_name;
    public $preview;
    public $type;

    public function __construct($row)
    {
    $this->id = $row['id'];
    $this->title = $row['title'];
    $this->date = $row['date'];
    $this->short_content = $row['short_content'];
    $this->content = $row['content'];
    $this->autor_name = $row['autor_name'];
    $this->preview = $row['preview'];
    $this->type = $row['type'];
    }
}

class NewsPublication extends Publication
{
    public function printItem() {
        echo '<br>Новость: ' . $this->title;
        echo '<br><img src = "http://oop/' . $this->preview . '">';
        echo '<br>Описание новости: ' . $this->short_content;
        echo '<br>Опубликована: ' . $this->date;
        echo '<hr>';
    }
}

class ArticlePublication extends Publication
{
    public function printItem() {
        echo '<br>Статья: ' . $this->title;
        echo '<br>' . $this->content;
        echo '<br><img src = "http://oop/' . $this->preview . '">';
        echo '<br>Автор: ' . $this->autor_name;
        echo '<hr>';
    }
}

class PhotoReportPublication extends Publication
{
    public function printItem() {
        echo '<br>Фотоотчёт: ' . $this->title;
        echo '<br>Описание фотоотчёта: ' . $this->short_content;
        echo '<br><img src = "http://oop/' . $this->preview . '">';
        echo '<hr>';
    }
}