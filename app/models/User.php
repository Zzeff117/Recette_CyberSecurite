<?php

require_once __DIR__ . '/../core/Database.php';

class User
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
$this->conn = $db->getConnection();    }

    public function create($email, $password)
    {
        $sql = "INSERT INTO users (email, password)
                VALUES (:email, :password)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':email' => $email,
            ':password' => password_hash($password, PASSWORD_BCRYPT)
        ]);
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([':email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}