<?php

require_once __DIR__ . '/../models/Recipe.php';
require_once __DIR__ . '/../core/Response.php';

class ApiRecipeController
{
    private $model;

    public function __construct()
    {
        $this->model = new Recipe();
    }

    public function index()
    {
        $recipes = $this->model->getAll();
        Response::json($recipes);
    }

    public function show()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            Response::json("ID manquant", 400);
        }

        $recipe = $this->model->find($id);

        if (!$recipe) {
            Response::json("Introuvable", 404);
        }

        Response::json($recipe);
    }
}
