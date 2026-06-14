<?php

require_once __DIR__ . '/../core/Database.php';

class Recipe
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAllAdvanced(
        $limit,
        $offset,
        $q = null,
        $country = null,
        $difficulty = null,
        $sort = 'latest'
    )
    {
        $sql = "SELECT * FROM recipes WHERE 1=1";

        $params = [];

        if (!empty($q)) {
            $sql .= " AND (title LIKE :q OR description LIKE :q)";
            $params[':q'] = "%$q%";
        }

        if (!empty($country)) {
            $sql .= " AND country = :country";
            $params[':country'] = $country;
        }

        if (!empty($difficulty)) {
            $sql .= " AND difficulty = :difficulty";
            $params[':difficulty'] = $difficulty;
        }

        $sql .= ($sort === 'oldest')
            ? " ORDER BY id ASC"
            : " ORDER BY id DESC";

        $sql .= " LIMIT :limit OFFSET :offset";

        $stmt = $this->conn->prepare($sql);

        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }

        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM recipes WHERE id = :id"
        );

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO recipes
            (
                title,
                description,
                ingredients,
                preparation,
                image
            )
            VALUES
            (
                :title,
                :description,
                :ingredients,
                :preparation,
                :image
            )
        ");

        return $stmt->execute([
            ':title' => $data['title'],
            ':description' => $data['description'],
            ':ingredients' => $data['ingredients'],
            ':preparation' => $data['preparation'],
            ':image' => $data['image']
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("
            UPDATE recipes
            SET
                title = :title,
                description = :description,
                ingredients = :ingredients,
                preparation = :preparation,
                image = :image
            WHERE id = :id
        ");

        return $stmt->execute([
            ':id' => $id,
            ':title' => $data['title'],
            ':description' => $data['description'],
            ':ingredients' => $data['ingredients'],
            ':preparation' => $data['preparation'],
            ':image' => $data['image']
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("
            DELETE FROM recipes
            WHERE id = :id
        ");

        return $stmt->execute([
            ':id' => $id
        ]);
    }
}
