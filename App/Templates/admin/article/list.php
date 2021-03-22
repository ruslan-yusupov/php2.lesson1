<?php

use App\Models\Article;

/**
 * @var array $articles
 */

?><!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
    <link rel="stylesheet" href="/styles/admin.css">
</head>
<body>
<h1>Новости</h1>
    <?php
    if (!empty($articles)) { ?>
        <ul>
            <?php
            /**
             * @var Article $article
             */
            foreach ($articles as $article) { ?>
                <li>
                    <h2>
                        <?php echo $article->title; ?>
                    </h2>
                    <p>
                        <?php echo $article->content; ?>
                    </p>
                    <a href="/admin/?type=update&id=<?php echo $article->id; ?>" class="admin-button">
                        Редактировать
                    </a>
                    <a href="/admin/delete.php?id=<?php echo $article->id; ?>" class="admin-button">
                        Удалить
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p>Новости отсутствуют.</p>
    <?php } ?>
    <a href="/admin/?type=add" class="admin-button">
        Добавить
    </a>
</body>
</html>
