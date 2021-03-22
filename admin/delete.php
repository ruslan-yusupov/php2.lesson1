<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

$articleId = $_GET['id'];

if (empty($articleId)) {
    header('Location: /admin/index.php');
    die;
}

$article = Article::findById($articleId);
$article->delete();

header('Location: /admin/');
die;
