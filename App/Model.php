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

        $result = $db->query($sql, [':id' => $id], static::class);

        return !empty($result) ? $result[0] : false;
    }

    public function insert()
    {

        $db = new Db;

        $props = get_object_vars($this);
        $fields = [];
        $binds = [];
        $data = [];

        foreach ($props as $name => $value) {

            if ('id' !== $name) {
                $fields[] = $name;
                $binds[] = ':' . $name;
                $data[':' . $name] = $value;
            }

        }

        $sql = '
            INSERT INTO ' . static::$table .
            '(' . implode(', ', $fields) . ') 
            VALUES (' . implode(', ', $binds) . ')';

        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();

    }

    public function update()
    {

        if (null === $this->id) {
            return false;
        }

        $model = static::findById($this->id);

        if (false === $model) {
            return false;
        }

        $db = new Db;

        $props = get_object_vars($this);
        $fields = [];
        $data = [];

        foreach ($props as $name => $value) {

            if ('id' !== $name) {
                $fields[] = $name . '=:' . $name;
                $data[':' . $name] = $value;
            }

        }

        $sql = '
            UPDATE ' . static::$table . ' 
            SET ' . implode(', ', $fields) . ' 
            WHERE id=' . $model->id;

        $db->execute($sql, $data);

        return null;

    }
}
