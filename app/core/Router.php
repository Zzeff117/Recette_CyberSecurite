<?php

class Router
{
    public function route()
    {
        $url = $_GET['url'] ?? '';

        $url = trim($url, '/');

        $segments = explode('/', $url);

        $controllerName = !empty($segments[0])
            ? ucfirst($segments[0]) . 'Controller'
            : 'HomeController';

        $method = $segments[1] ?? 'index';

        $controllerFile = "../app/controllers/$controllerName.php";

        if (file_exists($controllerFile)) {

            require_once $controllerFile;

            $controller = new $controllerName();

            if (method_exists($controller, $method)) {

                $controller->$method();

            } else {

                echo "Méthode introuvable";
            }

        } else {

            echo "Controller introuvable";
        }
    }
}
