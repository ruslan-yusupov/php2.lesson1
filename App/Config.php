<?php

namespace App;

class Config
{

    public $data;
    protected static $instance;

    /**
     * Config constructor.
     */
    protected function __construct()
    {

        $this->data = include __DIR__ . '/../config.php';

    }


    /**
     * @return static
     */
    public static function getInstance()
    {

        if (null !== static::$instance) {

            return static::$instance;

        }

        static::$instance = new static;

        return static::$instance;

    }

}
