<?php

class AuthMiddleware
{
    public static function check()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['user'])) {

            header('Location: /?url=auth/login');
            exit;
        }

        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] =
                bin2hex(random_bytes(32));
        }
    }
}
