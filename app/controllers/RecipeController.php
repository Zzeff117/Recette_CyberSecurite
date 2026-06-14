<?php

require_once __DIR__ . '/../models/Recipe.php';
require_once __DIR__ . '/../middleware/AuthMiddleware.php';
require_once __DIR__ . '/../Repositories/RecipeRepository.php';
require_once __DIR__ . '/../core/Csrf.php';
require_once __DIR__ . '/../Repositories/AuditLogRepository.php';


class RecipeController
{
    private $model;
    private $repo;

    public function __construct()
    {
        $this->model = new Recipe();
        $this->repo = new RecipeRepository();
    }

    public function index()
    {
        AuthMiddleware::check();

        $page = $_GET['page'] ?? 1;
        $limit = 6;
        $offset = ($page - 1) * $limit;

        if (!empty($_GET['q'])) {
            $recipes = $this->repo->search($_GET['q']);
        } else {
            $recipes = $this->repo->getAll($limit, $offset);
        }

        require __DIR__ . '/../views/recipes/index.php';
    }

    public function createForm()
    {
        AuthMiddleware::check();
        require __DIR__ . '/../views/recipes/create.php';
    }

    public function store()
    {
        AuthMiddleware::check();

	if (!Csrf::check($_POST['csrf_token'] ?? '')) {
    	die('CSRF token invalide');
	}

        $data = $_POST;
        $data['image'] = $this->uploadImage($_FILES['image'] ?? null);

	$this->model->create($data);

	$audit = new AuditLogRepository();

	$audit->log(
    	$_SESSION['user'] ?? 'unknown',
    	'RECIPE_CREATED'	
	);

	header("Location: /?url=recipe/index");
        exit;
    }

    public function editForm()
    {
        AuthMiddleware::check();

        $recipe = $this->model->find($_GET['id']);

        require __DIR__ . '/../views/recipes/edit.php';
    }

    public function update()
    {
        AuthMiddleware::check();

	if (!Csrf::check($_POST['csrf_token'] ?? '')) {
 	   die('CSRF token invalide');
	}
        $recipe = $this->model->find($_POST['id']);

        $image = $recipe['image'];
        $newImage = $this->uploadImage($_FILES['image'] ?? null);

        if ($newImage) {
            if (!empty($recipe['image'])) {
                $old = __DIR__ . '/../../public/uploads/recipes/' . $recipe['image'];
                if (file_exists($old)) unlink($old);
            }
            $image = $newImage;
        }

        $data = $_POST;
        $data['image'] = $image;
	
	$this->model->update($data['id'], $data);

	$audit = new AuditLogRepository();

	$audit->log(
    	$_SESSION['user'] ?? 'unknown',
    	'RECIPE_UPDATED'
	);

	header("Location: /?url=recipe/index");

        exit;
    }

    public function delete()
    {
        AuthMiddleware::check();

        $recipe = $this->model->find($_GET['id']);

        if (!empty($recipe['image'])) {
            $file = __DIR__ . '/../../public/uploads/recipes/' . $recipe['image'];
            if (file_exists($file)) unlink($file);
        }
	$this->model->delete($_GET['id']);

	$audit = new AuditLogRepository();

	$audit->log(
    	$_SESSION['user'] ?? 'unknown',
    	'RECIPE_DELETED'
	);

	header("Location: /?url=recipe/index");

        exit;
    }

    private function uploadImage($file)
    {
        if (!$file || $file['error'] !== 0) return null;

        $allowed = ['jpg','jpeg','png','webp'];

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            die("Format invalide");
        }

        if (!getimagesize($file['tmp_name'])) {
            die("Fichier invalide");
        }

        $name = bin2hex(random_bytes(16)) . "." . $ext;

        move_uploaded_file(
            $file['tmp_name'],
            __DIR__ . '/../../public/uploads/recipes/' . $name
        );

        return $name;
    }

	public function show()
{
    AuthMiddleware::check();

    $id = (int)($_GET['id'] ?? 0);

    $recipe = $this->model->find($id);

    if (!$recipe) {

        http_response_code(404);

        require_once
            __DIR__ . '/../views/errors/404.php';

        return;
    }

    require_once
        __DIR__ . '/../views/recipes/show.php';
}
}
