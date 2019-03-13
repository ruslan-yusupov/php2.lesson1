<?php

use App\Models\Article;

if (empty($_GET['id'])) {

    header('Location: /admin/');
    die;

}

require __DIR__ . '/../autoload.php';

$articleId = $_GET['id'];

$article = Article::findById($articleId);

$id = !empty($_POST['id']) ? $_POST['id'] : null;
$title = !empty($_POST['title']) ? $_POST['title'] : null;
$content = !empty($_POST['content']) ? $_POST['content'] : null;

if (null !== $id) {

    $article->title = $title;
    $article->content = $content;

    $article->update();

}

include __DIR__ . '/../App/Templates/admin/article_update.php';

