<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php echo (false !== $article) ? $article->title : 'Новость не найдена'; ?>
    </title>
</head>
<body>

    <?php

    if (false !== $article) { ?>

        <h1>
            <?php echo $article->title; ?>
        </h1>
        <p>
            <?php echo  $article->content; ?>
        </p>

        <form action="/admin/delete.php?id=<?php echo $article->id; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $article->id; ?>">

            <button type="submit">Удалить</button>
        </form>

    <?php } else { ?>

        <p>Новость не найдена или удалена.</p>

    <?php } ?>

    <p>
        <a href="/admin/">Назад к списку</a>
    </p>
</body>
</html>
