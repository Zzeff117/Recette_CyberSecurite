<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<title>Nouvel Asset</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:linear-gradient(135deg,#0f172a,#1e293b);
    min-height:100vh;
    padding:40px;
}

.card-form{
    max-width:900px;
    margin:auto;
    background:white;
    border-radius:20px;
    padding:40px;
    box-shadow:0 20px 40px rgba(0,0,0,.3);
}

.header{
    text-align:center;
    margin-bottom:30px;
}

.header h1{
    font-weight:700;
    color:#0f172a;
}

.header p{
    color:#64748b;
}

textarea{
    min-height:120px;
}

.btn-save{
    width:100%;
    padding:12px;
}

</style>

</head>

<body>

<div class="card-form">

    <div class="header">
        <h1>Nouvel Asset</h1>

        <p>
            Création d'un nouvel élément du référentiel
        </p>
    </div>

    <form
        method="POST"
        action="/?url=recipe/store"
        enctype="multipart/form-data"
    >

        <input
            type="hidden"
            name="csrf_token"
            value="<?= $_SESSION['csrf_token'] ?>"
        >

        <div class="mb-3">

            <label class="form-label">
                Titre
            </label>

            <input
                type="text"
                name="title"
                class="form-control"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Description
            </label>

            <textarea
                name="description"
                class="form-control"
                required></textarea>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Ingrédients
            </label>

            <textarea
                name="ingredients"
                class="form-control"
                required></textarea>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Préparation
            </label>

            <textarea
                name="preparation"
                class="form-control"
                required></textarea>

        </div>

        <div class="mb-4">

            <label class="form-label">
                Image
            </label>

            <input
                type="file"
                name="image"
                accept="image/*"
                class="form-control">

        </div>

        <button
            type="submit"
            class="btn btn-primary btn-save">
            Enregistrer
        </button>

        <div class="text-center mt-3">

            <a href="/?url=recipe/index">
                Retour aux Assets
            </a>

        </div>

    </form>

</div>

</body>
</html>
