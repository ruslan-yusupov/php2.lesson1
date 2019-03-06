<?php

require __DIR__ . '/autoload.php';

$db = new \App\Db();
$data = $db->query('SELECT * FROM news', [], 'App\Models\Article');

var_dump($data);
