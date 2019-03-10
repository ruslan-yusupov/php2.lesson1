<?php

namespace App;

abstract class Model
{

    protected static $table = '';

    public $id;

    public static function findAll()
    {

        $db = new Db();

        $sql = 'SELECT * FROM ' . static::$table;

        return $db->query($sql, [], static::class);

    }

}
