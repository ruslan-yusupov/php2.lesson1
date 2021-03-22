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
        $config = Config::getInstance();
        $dsn = 'mysql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'];
        $userName = $config->data['db']['username'];
        $password = $config->data['db']['password'];

        $this->dbh = new PDO($dsn, $userName, $password);
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

    /**
     * @return string
     */
    public function lastInsertId(): string
    {
        return $this->dbh->lastInsertId();
    }

}
