<?php require_once __DIR__.'/../layouts/header.php'; ?>
<?php require_once __DIR__.'/../layouts/sidebar.php'; ?>

<div class="container-fluid">

    <div class="mb-4">
        <h1>Security Incidents</h1>

        <p class="text-muted">
            Gestion et supervision des incidents de sécurité détectés par le SOC.
        </p>
    </div>

    <div class="card shadow-sm">

        <div class="card-header">
            Liste des incidents
        </div>

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Sévérité</th>
                        <th>Statut</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>

                <?php foreach($incidents as $incident): ?>

                    <tr>

                        <td>
                            <?= $incident['id'] ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($incident['title']) ?>
                        </td>

                        <td>

                            <?php if($incident['severity'] == 'Critical'): ?>

                                <span class="badge bg-danger">
                                    Critical
                                </span>

                            <?php elseif($incident['severity'] == 'High'): ?>

                                <span class="badge bg-warning text-dark">
                                    High
                                </span>

                            <?php else: ?>

                                <span class="badge bg-info text-dark">
                                    Medium
                                </span>

                            <?php endif; ?>

                        </td>

                        <td>

                            <?php if($incident['status'] == 'Open'): ?>

                                <span class="badge bg-danger">
                                    Open
                                </span>

                            <?php elseif($incident['status'] == 'Investigating'): ?>

                                <span class="badge bg-warning text-dark">
                                    Investigating
                                </span>

                            <?php else: ?>

                                <span class="badge bg-success">
                                    Closed
                                </span>

                            <?php endif; ?>

                        </td>

                        <td>
                            <?= $incident['created_at'] ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?php require_once __DIR__.'/../layouts/footer.php'; ?>
