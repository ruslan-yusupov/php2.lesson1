<?php

use App\Db;

require __DIR__ . '/../autoload.php';

$db = new Db;

$insertQuery = 'INSERT INTO news (title, content) VALUES (:title, :content)';
$insertParams = [':title' => 'Тестовый заголовок', ':content' => 'Тестовый контент'];

$updateQuery = 'UPDATE news SET content = :content WHERE title = :title';
$updateParams = [':content' => 'Тестовый контент другой', ':title' => 'Тестовый заголовок'];

$deleteQuery = 'DELETE FROM news WHERE title = :title';
$deleteParams = [':title' => 'Тестовый заголовок'];

assert(true === $db->execute($insertQuery, $insertParams));
assert(true === $db->execute($updateQuery, $updateParams));
assert(true === $db->execute($deleteQuery, $deleteParams));
