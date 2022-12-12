<?php

class DatabaseConfig {

    public $serverName;
    public $username;
    public $password;
    public $databaseName;

    public function __construct() {
        $this->serverName = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->databaseName = 'sof';
    }
}