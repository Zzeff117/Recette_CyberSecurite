<?php

class RoleMiddleware
{
    public static function check($role)
    {
        if (
            empty($_SESSION['role']) ||
            $_SESSION['role'] !== $role
        ) {
            http_response_code(403);

            die('Accès refusé');
        }
    }
}
