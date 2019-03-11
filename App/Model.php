<?php

namespace App;

abstract class Model
{

    protected static $table = '';

    public $id;

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

        $result = $db->query($sql, [':id' => $id]);

        return !empty($result) ? $result[0] : false ;
    }

}
