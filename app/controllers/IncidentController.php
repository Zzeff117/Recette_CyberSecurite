<?php

require_once __DIR__ . '/../Repositories/IncidentRepository.php';
require_once __DIR__ . '/../Repositories/AuditLogRepository.php';
require_once __DIR__ . '/../middleware/AuthMiddleware.php';
require_once __DIR__ . '/../middleware/RoleMiddleware.php';

class IncidentController
{
    public function index()
    {
        AuthMiddleware::check();
        RoleMiddleware::check('admin');

        $repo = new IncidentRepository();

        $incidents = $repo->getAll();

        $log = new AuditLogRepository();

        $log->log(
            $_SESSION['user'] ?? 'unknown',
            'INCIDENT_VIEWED'
        );

        require_once __DIR__ . '/../views/incidents/index.php';
    }
}
