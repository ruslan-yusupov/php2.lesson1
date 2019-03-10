<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';

$articles = Article::findAll();


var_dump($articles);