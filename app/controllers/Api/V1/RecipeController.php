<?php

require_once __DIR__ . '/../../../Services/RecipeService.php';

class RecipeController
{
    private $service;
    private $apiKey = "123456"; // 🔐 clé simple

    public function __construct()
    {
        $this->service = new RecipeService();
    }

    /**
     * 🔥 LISTE RECETTES (SECURISÉE)
     */
    public function index()
    {
        header('Content-Type: application/json');

        $this->checkApiKey();

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;

        if ($page < 1) $page = 1;
        if ($limit < 1 || $limit > 50) $limit = 5;

        $offset = ($page - 1) * $limit;

        $data = $this->service->list($limit, $offset);

        echo json_encode([
            'success' => true,
            'page' => $page,
            'limit' => $limit,
            'data' => $data
        ]);
    }

    /**
     * 🔥 DETAIL RECETTE (SECURISÉE)
     */
    public function show()
    {
        header('Content-Type: application/json');

        $this->checkApiKey();

        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id <= 0) {
            http_response_code(400);
            echo json_encode([
                'success' => false,
                'message' => 'ID invalide'
            ]);
            return;
        }

        $data = $this->service->detail($id);

        if (!$data) {
            http_response_code(404);
            echo json_encode([
                'success' => false,
                'message' => 'Recette introuvable'
            ]);
            return;
        }

        echo json_encode([
            'success' => true,
            'data' => $data
        ]);
    }

    /**
     * 🔐 CHECK API KEY
     */
    private function checkApiKey()
{
    $key = $_SERVER['HTTP_X_API_KEY'] ?? null;

    if ($key !== $this->apiKey) {
        http_response_code(401);

        echo json_encode([
            'success' => false,
            'message' => 'Unauthorized'
        ]);

        exit;
    }
}
}