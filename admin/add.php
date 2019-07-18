<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

if (!empty($_POST['title']) && !empty($_POST['content'])) {

    $article = new Article;
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->insert();

    header('Location: /admin/index.php');
    die;

}

include __DIR__ . '/../App/Templates/admin/article_add.php';
