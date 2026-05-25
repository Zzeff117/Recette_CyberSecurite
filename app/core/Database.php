<?php

class Database
{
    private $host = "db";
    private $dbname = "appdb";
    private $username = "root";
    private $password = "root";

    public $pdo;

    public function connect()
    {
        try {

            $this->pdo = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );

            $this->pdo->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            return $this->pdo;

        } catch (PDOException $e) {

            die("Erreur connexion DB : " . $e->getMessage());
        }
    }
}
