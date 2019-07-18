<?php

use App\Models\Article;

if (empty($_GET['id'])) {

    header('Location: /admin/index.php');
    die;

}

require __DIR__ . '/../autoload.php';

$articleId = $_GET['id'];

/**
 * @var Article $article
 */
$article = Article::findById($articleId);

if (!empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['content'])) {

    if (false === $article) {
        $article = new Article;
    }

    $article->title = $_POST['title'];
    $article->content = $_POST['content'];

    $article->save();

}

include __DIR__ . '/../App/Templates/admin/article_update.php';
