<nav class="navbar navbar-expand-lg navbar-dark cookbook-navbar">

```
<div class="container-fluid">

    <a class="navbar-brand fw-bold" href="/?url=recipe/index">
        🍽️ CookBook
    </a>

    <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCookBook">

        <span class="navbar-toggler-icon"></span>

    </button>

    <div
        class="collapse navbar-collapse"
        id="navbarCookBook">

        <ul class="navbar-nav ms-auto">

            <?php if (
                isset($_SESSION['role']) &&
                $_SESSION['role'] === 'admin'
            ): ?>

            <li class="nav-item">
                <a class="nav-link" href="/?url=home/index">
                    📊 Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/?url=vulnerability/index">
                    🛡️ Vulnérabilités
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/?url=incident/index">
                    🚨 Incidents
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/?url=audit/index">
                    📜 Audit
                </a>
            </li>

            <?php endif; ?>

            <li class="nav-item">
                <a class="nav-link" href="/?url=recipe/index">
                    🍽️ Recettes
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/?url=recipe/createForm">
                    ➕ Nouvelle recette
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-warning" href="/?url=auth/logout">
                    🚪 Déconnexion
                </a>
            </li>

        </ul>

    </div>

</div>
```

</nav>

<div class="content">

