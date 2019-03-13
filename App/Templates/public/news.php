<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
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
            </li>
        <?php } ?>
        </ul>

    <?php } else { ?>

        <p>Новости отсутствуют.</p>

    <?php } ?>

</body>
</html>
