<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<title>Créer un compte - CyberSec</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:linear-gradient(135deg,#0f172a,#1e293b);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.register-card{
    width:500px;
    background:white;
    border-radius:20px;
    padding:40px;
    box-shadow:0 20px 40px rgba(0,0,0,.3);
}

.logo{
    font-size:60px;
    text-align:center;
}

.title{
    text-align:center;
    margin-bottom:30px;
}

</style>

</head>

<body>

<div class="register-card">

    <div class="logo">
        🛡️
    </div>

    <div class="title">
        <h2>Créer un compte</h2>
        <p class="text-muted">
            Cyber Security Platform
        </p>
    </div>

    <form method="POST" action="/?url=auth/store">

        <div class="mb-3">
            <label>Email</label>

            <input
                type="email"
                name="email"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label>Mot de passe</label>

            <input
                type="password"
                name="password"
                class="form-control"
                required>
        </div>

        <button
            type="submit"
            class="btn btn-success w-100">
            Créer mon compte
        </button>

    </form>

    <hr>

    <div class="text-center">

        <a href="/?url=auth/login">
            Déjà inscrit ? Se connecter
        </a>

    </div>

</div>

</body>
</html>
