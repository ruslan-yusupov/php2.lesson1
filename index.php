<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';

$articles = Article::findLastNews(3);

include __DIR__ . '/App/Templates/public/article/list.php';
