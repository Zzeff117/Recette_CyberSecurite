<?php

require_once __DIR__ . '/../Repositories/AuditLogRepository.php';
require_once __DIR__ . '/../middleware/AuthMiddleware.php';
require_once __DIR__ . '/../middleware/RoleMiddleware.php';

class AuditController
{
    public function index()
    {
        AuthMiddleware::check();
        RoleMiddleware::check('admin');

        $repo = new AuditLogRepository();

        $logs = $repo->getAll();

        require_once __DIR__ . '/../views/audit/index.php';
    }
}
