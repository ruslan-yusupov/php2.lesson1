<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

$title = !empty($_POST['title']) ? $_POST['title'] : null;
$content = !empty($_POST['content']) ? $_POST['content'] : null;

if (null !== $title && null !== $content) {

    $article = new Article;
    $article->title = $title;
    $article->content = $content;
    $article->insert();

    header('Location: /admin/');
    die;

}

include __DIR__ . '/../App/Templates/admin/article_add.php';