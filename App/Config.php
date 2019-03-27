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

        $jsonData = file_get_contents(__DIR__ . '/../config.json');
        $this->data = json_decode($jsonData, true);

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
