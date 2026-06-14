<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">

<title>
<?= htmlspecialchars($recipe['title']) ?>
</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">

<style>

body{
    background:#f4f6f9;
}

.recipe-card{
    border:none;
    border-radius:15px;
    overflow:hidden;
}

.recipe-image{
    height:500px;
    width:100%;
    object-fit:cover;
}

.section-box{
    background:white;
    border-radius:10px;
    padding:20px;
    margin-top:20px;
    box-shadow:0 2px 10px rgba(0,0,0,.05);
}

.recipe-title{
    font-size:2rem;
    font-weight:700;
}

.recipe-description{
    color:#555;
    font-size:1.05rem;
}

.info-box{
    background:white;
    border-radius:10px;
    padding:20px;
    margin-top:20px;
    box-shadow:0 2px 10px rgba(0,0,0,.05);
}

.info-label{
    font-weight:bold;
    color:#333;
}

</style>

</head>

<body>

<div class="container py-5">

<a
class="btn btn-outline-secondary mb-4"
href="/?url=recipe/index">
Retour à la liste
</a>

<div class="card recipe-card shadow">

<?php if(!empty($recipe['image'])): ?>

<img
src="/uploads/recipes/<?= htmlspecialchars($recipe['image']) ?>"
class="recipe-image">

<?php endif; ?>

<div class="card-body p-4">

<h1 class="recipe-title">
<?= htmlspecialchars($recipe['title']) ?>
</h1>

<p class="recipe-description mt-3">
<?= htmlspecialchars($recipe['description']) ?>
</p>

</div>

</div>

<div class="info-box">

<div class="row">

<div class="col-md-4 mb-3">
<div class="info-label">Pays</div>
<div><?= htmlspecialchars($recipe['country'] ?? '-') ?></div>
</div>

<div class="col-md-4 mb-3">
<div class="info-label">Difficulté</div>
<div><?= htmlspecialchars($recipe['difficulty'] ?? '-') ?></div>
</div>

<div class="col-md-4 mb-3">
<div class="info-label">Chef</div>
<div><?= htmlspecialchars($recipe['chef_name'] ?? '-') ?></div>
</div>

<div class="col-md-4 mb-3">
<div class="info-label">Temps de préparation</div>
<div><?= htmlspecialchars($recipe['prep_time'] ?? '-') ?> min</div>
</div>

<div class="col-md-4 mb-3">
<div class="info-label">Temps de cuisson</div>
<div><?= htmlspecialchars($recipe['cook_time'] ?? '-') ?> min</div>
</div>

<div class="col-md-4 mb-3">
<div class="info-label">Portions</div>
<div><?= htmlspecialchars($recipe['servings'] ?? '-') ?></div>
</div>

</div>

</div>

<div class="section-box">

<h3>Ingrédients</h3>

<hr>

<p>
<?= nl2br(htmlspecialchars($recipe['ingredients'])) ?>
</p>

</div>

<div class="section-box">

<h3>Préparation</h3>

<hr>

<p>
<?= nl2br(htmlspecialchars($recipe['preparation'])) ?>
</p>

</div>

<div class="mt-4">

<a
class="btn btn-warning"
href="/?url=recipe/editForm&id=<?= $recipe['id'] ?>">
Modifier
</a>

<a
class="btn btn-secondary"
href="/?url=recipe/index">
Retour
</a>

</div>

</div>

</body>
</html>
