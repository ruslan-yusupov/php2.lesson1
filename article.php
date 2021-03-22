<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';

$articleId = $_GET['id'];

if (empty($articleId)) {
    header('Location: /index.php');
    die;
}

$article = Article::findById($articleId);

include __DIR__ . '/App/Templates/public/article/detail.php';
