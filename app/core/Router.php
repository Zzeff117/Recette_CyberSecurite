<?php

class Router
{
    public function route()
    {
        $url = $_GET['url'] ?? 'home/index';

        $url = trim($url, '/');

        $parts = explode('/', $url);

        if ($parts[0] === 'api') {

            $version = $parts[1] ?? 'v1';
            $controller = $parts[2] ?? 'home';
            $method = $parts[3] ?? 'index';

            $controllerClass =
                ucfirst($controller) . 'Controller';

            $file =
                __DIR__
                . '/../controllers/Api/'
                . strtoupper($version)
                . '/'
                . $controllerClass
                . '.php';

        } else {

            $controller = $parts[0];
            $method = $parts[1] ?? 'index';

            $controllerClass =
                ucfirst($controller) . 'Controller';

            $file =
                __DIR__
                . '/../controllers/'
                . $controllerClass
                . '.php';
        }

        $method = explode('?', $method)[0];

        if (!file_exists($file)) {

            http_response_code(404);

            require_once
                __DIR__
                . '/../views/errors/404.php';

            return;
        }

        require_once $file;

        if (!class_exists($controllerClass)) {

            http_response_code(500);

            die('Controller introuvable');
        }

        $controllerInstance =
            new $controllerClass();

        if (
            !method_exists(
                $controllerInstance,
                $method
            )
        ) {

            http_response_code(404);

            require_once
                __DIR__
                . '/../views/errors/404.php';

            return;
        }

        $controllerInstance->$method();
    }
}
