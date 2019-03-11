<?php

use App\Models\Article;

if (!isset($_GET['id']) || empty($_GET['id'])) {

    header('Location: /');
    die;

}

require __DIR__ . '/autoload.php';

$articleId = $_GET['id'];

$article = Article::findById($articleId);

include __DIR__ . '/templates/article.php';
