<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<title>CyberSec Platform</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background: linear-gradient(135deg,#0f172a,#1e293b);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-card{
    width:450px;
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

.btn-login{
    width:100%;
}

</style>

</head>

<body>

<div class="login-card">

    <div class="logo">
        🛡️
    </div>

    <div class="title">
        <h2>Cyber Security Platform</h2>
        <p class="text-muted">
            Authentification sécurisée
        </p>
    </div>

    <form method="POST" action="/?url=auth/authenticate">

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
            class="btn btn-primary btn-login">
            Se connecter
        </button>

    </form>

</div>

</body>
</html>
