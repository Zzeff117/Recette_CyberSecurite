<?php

require_once "config/database.php";

$db = new Database();
$conn = $db->getConnection();

if ($conn) {
    echo "Connexion OK à la base appdb";
} else {
    echo "Connexion échouée";
}