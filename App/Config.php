<?php

namespace App;

class Config
{

    protected static $data;
    protected static $instance;

    protected function __construct()
    {

        $jsonData = file_get_contents(__DIR__ . '/../config.json');
        static::$data = json_decode($jsonData, true);

    }

    /**
     * @return Config
     */
    public static function getInstance(): Config
    {

        if (null !== static::$instance) {

            return static::$instance;

        } else {

            static::$instance = new Config;

            return static::$instance;

        }

    }

    /**
     * @return array
     */
    public function getSettings(): array
    {
        return static::$data;
    }

}
