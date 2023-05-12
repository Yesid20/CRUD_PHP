<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class ConexionDB {
    private $host = 'localhost';
    private $port = '5432';
    private $dbname = 'my_dbprueba';
    private $user = 'nuevo';
    private $password = 'nuevo2021';
    private $pdo;

    public function __construct() {
        $dsn = "pgsql:host=$this->host;dbname=$this->dbname";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->password, $options);
            if ($this->pdo) {
                echo "Conexión exitosa a la base de datos.";
            }
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getPdo() {
        return $this->pdo;
    }
}

$db = new ConexionDB();

