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

if (null !== $id) {

    $article->delete();

    $article = Article::findById($articleId);
}

include __DIR__ . '/../App/Templates/admin/article_delete.php';