<?php
require __DIR__ . '/autoload.php';

use App\Models\Article;

$articles = Article::findLastNews(3);

include __DIR__ . '/templates/news.php';
