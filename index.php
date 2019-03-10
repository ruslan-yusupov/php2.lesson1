<?php

use App\Models\Article;

require __DIR__ . '/autoload.php';


$db = new \App\Db;

Article::findLastNews(3);
