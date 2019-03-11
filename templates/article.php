<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php echo !empty($article) ? $article['title'] : 'Новость не найдена'; ?>
    </title>
</head>
<body>

    <?php

    if (!empty($article)) { ?>

        <h1>
            <?php echo $article['title']; ?>
        </h1>
        <p>
            <?php echo  $article['content']; ?>
        </p>

    <?php } else { ?>
        <p>Новость не найдена</p>
    <?php } ?>
    <p>
        <a href="/">Назад к списку</a>
    </p>
</body>
</html>