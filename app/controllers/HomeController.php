<?php

require_once __DIR__ . '/../Repositories/SecurityEventRepository.php';
require_once __DIR__ . '/../Repositories/IncidentRepository.php';
require_once __DIR__ . '/../Repositories/AuditLogRepository.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../Repositories/VulnerabilityRepository.php';

class HomeController
{
    private $db;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function index()
    {
        $stmt = $this->db->query("
            SELECT COUNT(*) AS total_recipes
            FROM recipes
        ");

        $recipes = $stmt->fetch(PDO::FETCH_ASSOC);

        $vulnRepo = new VulnerabilityRepository();
	$incidentRepo = new IncidentRepository();
	$auditRepo = new AuditLogRepository();
	$eventRepo = new SecurityEventRepository();

	$latestEvents = $eventRepo->getLatest();
	$totalIncidents = $incidentRepo->countAll();
	$totalAuditLogs = $auditRepo->countAll();

        $totalRecipes = $recipes['total_recipes'];
        $totalVulnerabilities = $vulnRepo->countAll();
        $criticalVulnerabilities = $vulnRepo->countCritical();
        $openVulnerabilities = $vulnRepo->countOpen();

        require_once __DIR__ . '/../views/dashboard/index.php';
    }
}
