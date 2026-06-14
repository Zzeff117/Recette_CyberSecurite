<?php

header(
    "Content-Security-Policy: default-src 'self'; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net; img-src 'self' data:;"
);

header("X-Frame-Options: DENY");

header("X-Content-Type-Options: nosniff");

header("Referrer-Policy: no-referrer");

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "../app/core/Router.php";

$router = new Router();
$router->route();
