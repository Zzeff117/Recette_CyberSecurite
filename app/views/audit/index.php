<?php require_once __DIR__.'/../layouts/header.php'; ?>
<?php require_once __DIR__.'/../layouts/sidebar.php'; ?>

<div class="mb-4">

    <h1>
        Security Audit Logs
    </h1>

    <p class="text-muted">
        Journalisation des événements de sécurité et traçabilité des actions utilisateurs
    </p>

</div>

<div class="card shadow-sm">

    <div class="card-header">
        Audit Events
    </div>

    <div class="card-body">

        <table class="table table-hover align-middle">

            <thead class="table-dark">

                <tr>
                    <th>ID</th>
                    <th>Utilisateur</th>
                    <th>Action</th>
                    <th>Date</th>
                </tr>

            </thead>

            <tbody>

            <?php foreach($logs as $log): ?>

                <tr>

                    <td>
                        <?= $log['id'] ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($log['username']) ?>
                    </td>

                    <td>

                        <?php
                        $action = $log['action'];

                        if ($action === 'LOGIN_SUCCESS') {
                            echo '<span class="badge bg-success">LOGIN_SUCCESS</span>';
                        }
                        elseif ($action === 'LOGIN_FAILED') {
                            echo '<span class="badge bg-danger">LOGIN_FAILED</span>';
                        }
                        elseif ($action === 'LOGOUT') {
                            echo '<span class="badge bg-secondary">LOGOUT</span>';
                        }
                        elseif ($action === 'RECIPE_CREATED') {
                            echo '<span class="badge bg-primary">RECIPE_CREATED</span>';
                        }
                        elseif ($action === 'RECIPE_UPDATED') {
                            echo '<span class="badge bg-info text-dark">RECIPE_UPDATED</span>';
                        }
                        elseif ($action === 'RECIPE_DELETED') {
                            echo '<span class="badge bg-dark">RECIPE_DELETED</span>';
                        }
                        elseif ($action === 'INCIDENT_VIEWED') {
                            echo '<span class="badge bg-warning text-dark">INCIDENT_VIEWED</span>';
                        }
                        elseif ($action === 'VULNERABILITY_VIEWED') {
                            echo '<span class="badge bg-warning">VULNERABILITY_VIEWED</span>';
                        }
                        else {
                            echo '<span class="badge bg-light text-dark">'
                                 . htmlspecialchars($action)
                                 . '</span>';
                        }
                        ?>

                    </td>

                    <td>
                        <?= htmlspecialchars($log['created_at']) ?>
                    </td>

                </tr>

            <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<?php require_once __DIR__.'/../layouts/footer.php'; ?>
