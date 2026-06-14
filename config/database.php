<?php

class Database
{
    private $host = "mysql";
    private $db_name = "appdb";
    private $username = "root";
    private $password = "root";

    public $conn;

    public function getConnection()
    {
        $this->conn = null;

        try {

            $dsn =
                "mysql:host={$this->host};" .
                "dbname={$this->db_name};" .
                "charset=utf8mb4";

            $this->conn = new PDO(
                $dsn,
                $this->username,
                $this->password,
                [
                    PDO::MYSQL_ATTR_INIT_COMMAND =>
                        "SET NAMES utf8mb4",
                    PDO::ATTR_ERRMODE =>
                        PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE =>
                        PDO::FETCH_ASSOC
                ]
            );

        } catch (PDOException $exception) {

            die(
                "Erreur connexion : " .
                $exception->getMessage()
            );
        }

        return $this->conn;
    }
}
