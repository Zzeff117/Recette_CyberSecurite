<?php

require_once __DIR__ . '/../core/Database.php';

class SecurityEventRepository
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getLatest($limit = 5)
    {
        $stmt = $this->conn->prepare("
            SELECT *
            FROM security_events
            ORDER BY created_at DESC
            LIMIT :limit
        ");

        $stmt->bindValue(
            ':limit',
            (int)$limit,
            PDO::PARAM_INT
        );

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
