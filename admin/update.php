<?php

use App\Models\Article;

if (empty($_GET['id'])) {

    header('Location: /admin/index.php');
    die;

}

require __DIR__ . '/../autoload.php';

$articleId = $_GET['id'];

/**
 * @var \App\Models\Article $article
 */
$article = Article::findById($articleId);

$id = !empty($_POST['id']) ? $_POST['id'] : null;
$title = !empty($_POST['title']) ? $_POST['title'] : null;
$content = !empty($_POST['content']) ? $_POST['content'] : null;

if (null !== $id && null !== $title && null !== $content) {

    if (false === $article) {
        $article = new Article;
    }

    $article->title = $title;
    $article->content = $content;

    $article->save();

}

include __DIR__ . '/../App/Templates/admin/article_update.php';
