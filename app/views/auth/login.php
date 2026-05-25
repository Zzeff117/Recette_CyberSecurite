<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>

<h1>Connexion</h1>

<form action="http://localhost:8085/auth/authenticate" method="POST">

    <input
        type="email"
        name="email"
        placeholder="Email"
        required
    >

    <br><br>

    <input
        type="password"
        name="password"
        placeholder="Mot de passe"
        required
    >

    <br><br>

    <button type="submit">
        Connexion
    </button>

</form>

</body>
</html>
