<?php

require_once __DIR__.'/../core/Database.php';

class IncidentRepository
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->conn->query("
            SELECT *
            FROM incidents
            ORDER BY id DESC
        ");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
	public function countAll()
	{
    		$stmt = $this->conn->query("
        	SELECT COUNT(*) total
       		FROM incidents
   	 	");

	    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
	}

}
