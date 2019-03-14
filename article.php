<?php

use App\Models\Article;

if (empty($_GET['id'])) {

    header('Location: /index.php');
    die;

}

require __DIR__ . '/autoload.php';

$articleId = $_GET['id'];

$article = Article::findById($articleId);

include __DIR__ . '/App/Templates/public/article.php';
