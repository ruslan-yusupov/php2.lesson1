<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

switch (true) {
    case empty($_POST['id']):
    case empty($_POST['title']):
    case empty($_POST['content']):
        header('Location: /admin/index.php');
        die;
}

$articleId = $_POST['id'];
$article = Article::findById($articleId);

if (false === $article) {
    $article = new Article;
}

$article->title = $_POST['title'];
$article->content = $_POST['content'];
$article->save();

header('Location: /admin/?type=update&id=' . $article->id);
die;
