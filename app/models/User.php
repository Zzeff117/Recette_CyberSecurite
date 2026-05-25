<?php

require_once "../app/core/Database.php";

class User
{
    private $pdo;

    public function __construct()
    {
        $database = new Database();

        $this->pdo = $database->connect();
    }

    public function create($username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(username, email, password)
                VALUES(:username, :email, :password)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashedPassword
        ]);
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':email' => $email
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
