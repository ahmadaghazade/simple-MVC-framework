<?php

namespace App\App\Core;

use PDO;
use PDOException;

class Database
{
    private $host = 'localhost';
    private $dbname = 'mvc';
    private $username = 'root';
    private $password = '';
    private $pdo;
    private static $instance = null;

    private function __construct()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            die('Database Connection Failed.' . $e->getMessage());
        }
    }
    public static function getInstance()
    {
        if (self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }

}