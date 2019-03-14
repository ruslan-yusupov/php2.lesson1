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

$article->delete();

header('Location: /admin/index.php');
die;
