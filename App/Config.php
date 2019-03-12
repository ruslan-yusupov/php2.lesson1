<?php

namespace App;

class Config
{

    public $data;

    public function __construct()
    {

        $jsonData = file_get_contents(__DIR__ . '/../config.json');
        $this->data = json_decode($jsonData, true);

    }

}
