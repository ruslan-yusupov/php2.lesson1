<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
    <link rel="stylesheet" href="/styles/admin_css.css">
</head>
<body>
<h1>Новости</h1>

    <?php

    if (!empty($articles)) { ?>

        <ul>
        <?php
        foreach ($articles as $article) { ?>
            <li>
                <a href="/article.php?id=<?php echo $article->id; ?>">
                    <?php echo $article->title; ?>
                </a>
                <a href="/admin/update.php?id=<?php echo $article->id; ?>" class="admin-button">
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

    <a href="/admin/add.php" class="admin-button">
        Добавить
    </a>
</body>
</html>
