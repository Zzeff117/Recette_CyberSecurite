<?php

require_once __DIR__ . '/../core/Database.php';

class RecipeRepository
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAll($limit = 10, $offset = 0)
    {
        $stmt = $this->conn->prepare("
            SELECT * FROM recipes
            ORDER BY id DESC
            LIMIT :limit OFFSET :offset
        ");

        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔥 AJOUT SAFE pour compatibilité controller
    public function paginate($limit = 10, $offset = 0)
    {
        return $this->getAll($limit, $offset);
    }

    // 🔥 AJOUT SAFE recherche
    public function search($q)
    {
        $stmt = $this->conn->prepare("
            SELECT * FROM recipes
            WHERE title LIKE :q
               OR description LIKE :q
               OR ingredients LIKE :q
            ORDER BY id DESC
        ");

        $stmt->execute([
            ':q' => "%$q%"
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare("
            SELECT * FROM recipes WHERE id = :id
        ");

        $stmt->execute([':id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO recipes (title, description, ingredients, preparation, image)
            VALUES (:title, :description, :ingredients, :preparation, :image)
        ");

        return $stmt->execute($data);
    }
}
