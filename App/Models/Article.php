<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{

    protected static string $table = 'news';

    public string $title;
    public string $content;

    public static function findLastNews(int $amount): array
    {

        $db = new Db;
        $sql = 'SELECT * FROM ' . self::$table . ' ORDER BY id DESC LIMIT ' . $amount;

        return $db->query($sql);

    }

}
