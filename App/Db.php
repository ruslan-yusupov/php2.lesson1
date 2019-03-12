<?php

namespace App;

class Db
{

    protected $dbh;

    public function __construct()
    {
        $config = new Config;

        $dsn = 'mysql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'];
        $userName = $config->data['db']['username'];
        $password = $config->data['db']['password'];

        $this->dbh = new \PDO($dsn, $userName, $password);
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
