<?php

class Csrf
{
    public static function token()
    {
        return $_SESSION['csrf_token'];
    }

    public static function check($token)
    {
        return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
    }
}
