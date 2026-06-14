<?php

require_once 'app/Repositories/AuditLogRepository.php';

$audit = new AuditLogRepository();

$result = $audit->log(
    'admin@test.local',
    'Test audit'
);

var_dump($result);
