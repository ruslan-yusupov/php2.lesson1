<?php

namespace App;

class Config
{

    public array $data;
    protected static $instance;

    /**
     * Config constructor.
     */
    protected function __construct()
    {
        $this->data = require_once __DIR__ . '/../config.php';
    }


    /**
     * @return static
     */
    public static function getInstance(): static
    {
        if (null !== static::$instance) {

            return static::$instance;

        }

        static::$instance = new static;

        return static::$instance;
    }

}
