<?php
use App\Models\Article;

require __DIR__ . '/../autoload.php';

$articles = Article::findAll();

include __DIR__ . '/../App/Templates/admin/news.php';
