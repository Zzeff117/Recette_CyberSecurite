<?php require_once __DIR__.'/../layouts/header.php'; ?>
<?php require_once __DIR__.'/../layouts/sidebar.php'; ?>

<div class="container-fluid">

    <div class="mb-4">
        <h1>Vulnerability Management</h1>

        <p class="text-muted">
            Gestion des vulnérabilités détectées sur les actifs du système d'information.
        </p>
    </div>

    <div class="card shadow-sm">

        <div class="card-header">
            Registre des vulnérabilités
        </div>

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Sévérité</th>
                        <th>Statut</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach($vulnerabilities as $v): ?>

                    <tr>

                        <td>
                            <?= $v['id'] ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($v['title']) ?>
                        </td>

                        <td>

                            <?php if($v['severity'] == 'Critical'): ?>

                                <span class="badge bg-danger">
                                    Critical
                                </span>

                            <?php elseif($v['severity'] == 'High'): ?>

                                <span class="badge bg-warning text-dark">
                                    High
                                </span>

                            <?php elseif($v['severity'] == 'Medium'): ?>

                                <span class="badge bg-info text-dark">
                                    Medium
                                </span>

                            <?php else: ?>

                                <span class="badge bg-secondary">
                                    Low
                                </span>

                            <?php endif; ?>

                        </td>

                        <td>

                            <?php if($v['status'] == 'Open'): ?>

                                <span class="badge bg-danger">
                                    Open
                                </span>

                            <?php elseif($v['status'] == 'In Progress'): ?>

                                <span class="badge bg-warning text-dark">
                                    In Progress
                                </span>

                            <?php else: ?>

                                <span class="badge bg-success">
                                    Resolved
                                </span>

                            <?php endif; ?>

                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php require_once __DIR__.'/../layouts/footer.php'; ?>
