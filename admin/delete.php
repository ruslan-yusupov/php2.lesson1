<?php

use App\Models\Article;

if (empty($_GET['id'])) {

    header('Location: /admin/');
    die;

}

require __DIR__ . '/../autoload.php';

$articleId = $_GET['id'];

$article = Article::findById($articleId);

$id = $_POST['id'] ?: null;

if (null !== $id) {

    $article->delete();

    //TODO не удаляется объект

}

include __DIR__ . '/../App/Templates/admin/article_delete.php';