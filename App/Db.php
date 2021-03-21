<?php

namespace App;

use PDO;

class Db
{

    protected PDO $dbh;

    /**
     * Db constructor.
     */
    public function __construct()
    {
        $this->dbh = new PDO('mysql:host=mysql;dbname=db;', 'root', 'root');
    }

    /**
     * @param string $sql
     * @param array $params
     * @param string|null $class
     * @return array
     */
    public function query(string $sql, array $params = [], string $class = null): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        if (null === $class) {
            $sth->setFetchMode(PDO::FETCH_ASSOC);
        } else {
            $sth->setFetchMode(PDO::FETCH_CLASS, $class);
        }

        return $sth->FetchAll();
    }

    /**
     * @param string $query
     * @param array $params
     * @return bool
     */
    public function execute(string $query, array $params = []): bool
    {
        $sth = $this->dbh->prepare($query);

        return $sth->execute($params);
    }

}
