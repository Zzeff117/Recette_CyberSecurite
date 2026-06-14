<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../Repositories/AuditLogRepository.php';

class AuthController
{
    private $userModel;

    public function __construct()
    {
        session_start();
        $this->userModel = new User();
    }

    public function register()
    {
        require __DIR__ . '/../views/auth/register.php';
    }

    public function store()
    {
        $this->userModel->create(
            $_POST['email'],
            $_POST['password']
        );

        header("Location: /?url=auth/login");
        exit;
    }

    public function login()
    {
        require __DIR__ . '/../views/auth/login.php';
    }

    public function authenticate()
    {
        $user = $this->userModel->findByEmail($_POST['email']);

        $audit = new AuditLogRepository();

	$failedAttempts = $audit->countRecentFailures(
    	$_POST['email'] ?? 'unknown'
	);

	if ($failedAttempts >= 5) {
	    die('Compte temporairement bloqué. Réessayez dans 15 minutes.');
	}

        if ($user && password_verify($_POST['password'], $user['password'])) {

            $_SESSION['user'] = $user['email'];
	    $_SESSION['role'] = $user['role'];
            $audit->log(
                $user['email'],
                'LOGIN_SUCCESS'
            );

            header("Location: /?url=recipe/index");
            exit;
        }

        $audit->log(
            $_POST['email'] ?? 'unknown',
            'LOGIN_FAILED'
        );

        echo "Login incorrect";
    }

    public function logout()
    {
        if (!empty($_SESSION['user'])) {

            $audit = new AuditLogRepository();

            $audit->log(
                $_SESSION['user'],
                'LOGOUT'
            );
        }

        session_destroy();

        header("Location: /?url=auth/login");
        exit;
    }
}
