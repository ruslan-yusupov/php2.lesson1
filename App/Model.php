<?php

namespace App;

abstract class Model
{

    protected static string $table = '';

    public int $id;

    public static function findAll(): array
    {
        $db = new Db;

        $sql = 'SELECT * FROM ' . static::$table;

        return $db->query($sql, [], static::class);
    }

    public static function findById(int $id)
    {
        $db = new Db;

        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';

        $result = $db->query($sql, [':id' => $id], static::class);

        return !empty($result) ? reset($result) : false;
    }

}
