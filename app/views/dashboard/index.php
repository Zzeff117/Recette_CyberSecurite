<?php require_once __DIR__ . '/../layouts/header.php'; ?>
<?php require_once __DIR__ . '/../layouts/sidebar.php'; ?>

<div class="mb-4">

    <h1 class="fw-bold">
        Cyber Security Operations Center
    </h1>

    <p class="text-muted">
        Supervision des actifs, vulnérabilités, incidents et journaux de sécurité
    </p>

</div>

<div class="row g-4">

    <div class="col-md-2">
        <div class="card border-primary shadow-sm text-center">
            <div class="card-body">
                <h6>Assets</h6>
                <h2><?= $totalRecipes ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card border-warning shadow-sm text-center">
            <div class="card-body">
                <h6>Vulnérabilités</h6>
                <h2><?= $totalVulnerabilities ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card border-danger shadow-sm text-center">
            <div class="card-body">
                <h6>Critiques</h6>
                <h2><?= $criticalVulnerabilities ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card border-info shadow-sm text-center">
            <div class="card-body">
                <h6>Ouvertes</h6>
                <h2><?= $openVulnerabilities ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card border-dark shadow-sm text-center">
            <div class="card-body">
                <h6>Incidents</h6>
                <h2><?= $totalIncidents ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <div class="card border-success shadow-sm text-center">
            <div class="card-body">
                <h6>Audit Logs</h6>
                <h2><?= $totalAuditLogs ?></h2>
            </div>
        </div>
    </div>

</div>

<hr class="my-5">

<h3 class="mb-4">Security Metrics</h3>

<div class="card shadow-sm p-4">
    <canvas id="securityChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(
    document.getElementById('securityChart'),
    {
        type: 'bar',
        data: {
            labels: [
                'Assets',
                'Vulnerabilities',
                'Critical',
                'Open',
                'Incidents'
            ],
            datasets: [{
                label: 'SOC Metrics',
                data: [
                    <?= $totalRecipes ?>,
                    <?= $totalVulnerabilities ?>,
                    <?= $criticalVulnerabilities ?>,
                    <?= $openVulnerabilities ?>,
                    <?= $totalIncidents ?>
                ]
            }]
        }
    }
);

</script>

<hr class="my-5">

<h3 class="mb-4">Infrastructure Status</h3>

<div class="row g-4">

    <div class="col-md-4">
        <div class="card shadow-sm text-center">
            <div class="card-body">
                <h5>Apache</h5>
                <span class="badge bg-success">
                    UP
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm text-center">
            <div class="card-body">
                <h5>MySQL</h5>
                <span class="badge bg-success">
                    UP
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm text-center">
            <div class="card-body">
                <h5>Docker</h5>
                <span class="badge bg-success">
                    UP
                </span>
            </div>
        </div>
    </div>

</div>

<hr class="my-5">

<div class="card shadow-sm">

    <div class="card-header fw-bold">
        Latest Security Events
    </div>

    <div class="card-body">

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Event</th>
                    <th>Severity</th>
                    <th>Source</th>
                </tr>
            </thead>

            <tbody>

            <?php foreach($latestEvents as $event): ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($event['title']) ?>
                    </td>

                    <td>

                        <?php if($event['severity'] == 'Critical'): ?>

                            <span class="badge bg-danger">
                                Critical
                            </span>

                        <?php elseif($event['severity'] == 'High'): ?>

                            <span class="badge bg-warning">
                                High
                            </span>

                        <?php else: ?>

                            <span class="badge bg-info">
                                Medium
                            </span>

                        <?php endif; ?>

                    </td>

                    <td>
                        <?= htmlspecialchars($event['source']) ?>
                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
