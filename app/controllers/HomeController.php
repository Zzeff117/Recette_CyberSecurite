<?php

require_once "../app/core/Database.php";

class HomeController
{
    public function index()
    {
        $database = new Database();

        $pdo = $database->connect();

        if ($pdo) {

            echo "Connexion MySQL réussie 🚀";

        } else {

            echo "Erreur connexion DB";
        }
    }
}
