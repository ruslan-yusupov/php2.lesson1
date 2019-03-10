<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{

    protected static $table = 'news';

    public $title;
    public $content;

    public static function findLastNews(int $amount): array
    {

        $db = new Db;

        $sql = 'SELECT * FROM ' . self::$table . ' ORDER BY id DESC LIMIT :amount';

        $data = $db->query($sql, [':amount' => $amount]);

        var_dump($data); // empty

        return $data;

    }

}
