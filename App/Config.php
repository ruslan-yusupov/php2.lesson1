<?php

namespace App;

class Config
{

    protected static $data;
    protected static $instance;

    /**
     * Config constructor.
     */
    protected function __construct()
    {

        $jsonData = file_get_contents(__DIR__ . '/../config.json');
        static::$data = json_decode($jsonData, true);

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

    /**
     * @return array
     */
    public function getSettings(): array
    {
        return static::$data;
    }

}
