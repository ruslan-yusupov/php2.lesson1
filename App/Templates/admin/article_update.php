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

    <h1>Редактирование новости</h1>
    <?php

    if (false !== $article) { ?>

        <form action="/admin/update.php?id=<?php echo $article->id; ?>" method="post">

            <input type="hidden" name="id" value="<?php echo $article->id; ?>">

            <label for="title">
                Заголовок
                <br>
                <input type="text" id="title" name="title" size="100" value="<?php echo $article->title; ?>">
            </label>
            <br>
            <label for="content">
                Текст
                <br>
                <textarea id="content" name="content" rows="10" cols="100"><?php echo $article->content; ?></textarea>
            </label>
            <br>
            <button type="submit">Редактировать</button>

        </form>

    <?php } else { ?>

        <p>Новость не найдена</p>

    <?php } ?>

    <p>
        <a href="/admin/">Назад к списку</a>
    </p>
</body>
</html>
