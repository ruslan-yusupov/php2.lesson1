<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Добавление статьи
    </title>
</head>
<body>
    <h1>Добавление новости</h1>
    <form action="/admin/add.php" method="post">
        <label for="title">
            Заголовок
            <br>
            <input type="text" id="title" required name="title" size="100" value="">
        </label>
        <br>
        <label for="content">
            Текст
            <br>
            <textarea id="content" name="content" required rows="10" cols="100"></textarea>
        </label>
        <br>
        <button type="submit">Добавить</button>
    </form>
    <p>
        <a href="/admin">Назад к списку</a>
    </p>
</body>
</html>
