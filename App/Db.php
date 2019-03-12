<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=mysql;dbname=php2;', 'root', 'root');
    }

    public function query(string $sql, array $params = [], string $class = null): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        if (null === $class) {
            $sth->setFetchMode(\PDO::FETCH_ASSOC);
        } else {
            $sth->setFetchMode(\PDO::FETCH_CLASS, $class);
        }

        return $sth->FetchAll();
    }

    public function execute(string $query, array $params = []): bool
    {
        $sth = $this->dbh->prepare($query);

        return $sth->execute($params);
    }

    public function lastInsertId(): string
    {
        return $this->dbh->lastInsertId();
    }

}
