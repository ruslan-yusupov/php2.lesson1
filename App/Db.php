<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=172.18.0.3;dbname=php2;', 'root', 'root');
    }

    public function query($sql, $params = [], $class = null)
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        $sth->setFetchMode(\PDO::FETCH_ASSOC);
        $data = $sth->FetchAll();

        if (null === $class) {
            return $data;
        }

        $ret = [];

        foreach ($data as $row) {
            $obj = new $class;
            foreach ($row as $property => $value) {
                $obj->$property = $value;
            }
            $ret[] = $obj;
        }

        return $ret;

    }

}
