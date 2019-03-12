<?php

require __DIR__ . '/autoload.php';

use App\Models\Article;

$article = Article::findById(25);


if (false !== $article) {
    $article->title = 'Заголовок';
    $article->content = 'Контент';
    $article->update();

}

$articles = Article::findLastNews(3);

include __DIR__ . '/App/Templates/news.php';
