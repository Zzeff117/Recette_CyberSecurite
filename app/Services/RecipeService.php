<?php

require_once __DIR__ . '/../Repositories/RecipeRepository.php';

class RecipeService
{
    private $repo;

    public function __construct()
    {
        $this->repo = new RecipeRepository();
    }

    public function list($limit, $offset)
    {
        return $this->repo->getAll($limit, $offset);
    }

    public function detail($id)
    {
        return $this->repo->find($id);
    }
}
