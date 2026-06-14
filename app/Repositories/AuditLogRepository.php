<?php

require_once __DIR__ . '/../core/Database.php';

class AuditLogRepository
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function log($username, $action)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO audit_logs(username, action)
            VALUES(:username, :action)
        ");

        return $stmt->execute([
            ':username' => $username,
            ':action' => $action
        ]);
    }
public function getAll()
{
    $stmt = $this->conn->query("
        SELECT *
        FROM audit_logs
        ORDER BY id DESC
    ");

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
public function countRecentFailures($username)
{
    $stmt = $this->conn->prepare("
        SELECT COUNT(*) total
        FROM audit_logs
        WHERE username = :username
        AND action = 'LOGIN_FAILED'
        AND created_at >= DATE_SUB(NOW(), INTERVAL 15 MINUTE)
    ");

    $stmt->execute([
        ':username' => $username
    ]);

    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

public function countAll()
{
    $stmt = $this->conn->query("
        SELECT COUNT(*) total
        FROM audit_logs
    ");

    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}
}
