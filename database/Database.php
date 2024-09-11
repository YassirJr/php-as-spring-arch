<?php

namespace database;

use PDO;
use PDOException;

class Database
{
    private static ?Database $instance = null;

    private string $host = "127.0.0.1";
    private string $port = "3306";
    private string $user = "root";
    private string $pass = "root";
    private string $dbname = "my_db";

    private function __construct() {}

    /**
     * @return Database
     */
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @param string $host
     * @param string $port
     * @param string $user
     * @param string $pass
     * @param string $dbname
     * @return void
     */
    public function setConnectionInfo(string $host, string $port, string $user, string $pass, string $dbname): void
    {
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
    }

    /**
     * @return PDO
     */
    public function connect(): PDO
    {
        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->dbname};charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            return new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e) {
            throw new PDOException("Connection failed: " . $e->getMessage());
        }
    }
}

