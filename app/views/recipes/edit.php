<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<title>Modifier Asset</title>

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
    color:#0f172a;
    font-weight:700;
}

.preview{
    max-width:300px;
    border-radius:10px;
    margin-top:10px;
}

textarea{
    min-height:120px;
}

.btn-save{
    width:100%;
}

</style>

</head>

<body>

<div class="card-form">

    <div class="header">
        <h1>Modifier Asset</h1>

        <p class="text-muted">
            Mise à jour des informations
        </p>
    </div>

    <form
        method="POST"
        action="/?url=recipe/update"
        enctype="multipart/form-data">

        <input
            type="hidden"
            name="csrf_token"
            value="<?= $_SESSION['csrf_token'] ?>"
        >

        <input
            type="hidden"
            name="id"
            value="<?= (int)$recipe['id'] ?>"
        >

        <input
            type="hidden"
            name="current_image"
            value="<?= $recipe['image'] ?? '' ?>"
        >

        <?php if (!empty($recipe['image'])): ?>

            <div class="mb-4 text-center">

                <label class="form-label">
                    Image actuelle
                </label>

                <br>

                <img
                    src="/uploads/recipes/<?= htmlspecialchars($recipe['image']) ?>"
                    class="preview"
                >

            </div>

        <?php endif; ?>

        <div class="mb-3">

            <label class="form-label">
                Titre
            </label>

            <input
                type="text"
                name="title"
                class="form-control"
                value="<?= htmlspecialchars($recipe['title'] ?? '') ?>"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Description
            </label>

            <textarea
                name="description"
                class="form-control"
                required><?= htmlspecialchars($recipe['description'] ?? '') ?></textarea>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Ingrédients
            </label>

            <textarea
                name="ingredients"
                class="form-control"
                required><?= htmlspecialchars($recipe['ingredients'] ?? '') ?></textarea>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Préparation
            </label>

            <textarea
                name="preparation"
                class="form-control"
                required><?= htmlspecialchars($recipe['preparation'] ?? '') ?></textarea>

        </div>

        <div class="mb-4">

            <label class="form-label">
                Remplacer l'image
            </label>

            <input
                type="file"
                name="image"
                accept=".jpg,.jpeg,.png,.webp"
                class="form-control">

        </div>

        <button
            type="submit"
            class="btn btn-primary btn-save">
            Enregistrer les modifications
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
