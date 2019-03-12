<?php

require __DIR__ . '/autoload.php';

use App\Models\Article;

$articles = Article::findLastNews(3);


$article = new Article;

$article->title = 'Заголовок';
$article->content = 'Контент';

$article->insert();

include __DIR__ . '/App/Templates/news.php';
