<?php

class AuthController
{
    public function login()
    {
        require_once "../app/views/auth/login.php";
    }

    public function authenticate()
    {
        echo "AUTH METHOD OK";
    }
}
