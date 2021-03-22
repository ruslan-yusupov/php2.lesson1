<?php

use App\Models\Article;

require __DIR__ . '/../autoload.php';

$type = $_GET['type'] ?? 'list';

switch ($type) {
    case 'add':
        $templatePath = __DIR__ . '/../App/Templates/admin/article/add.php';
        break;
    case 'update':
        $articleId = $_GET['id'];

        if (empty($articleId)) {
            header('Location: /admin/index.php');
            die;
        }

        $article = Article::findById($articleId);
        $templatePath = __DIR__ . '/../App/Templates/admin/article/update.php';
        break;
    default:
        $articles = Article::findAll();
        $templatePath = __DIR__ . '/../App/Templates/admin/article/list.php';
        break;
}

include $templatePath;
