<?php

use App\Models\Article;

if (empty($_GET['id'])) {

    header('Location: /admin/');
    die;

}

require __DIR__ . '/../autoload.php';

$articleId = $_GET['id'];

$article = Article::findById($articleId);

$article->delete();

header('Location: /admin/');