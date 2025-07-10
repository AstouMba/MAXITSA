<?php

    namespace App\Core;

    class Router{

        public static function resolver($routes){
            $uri = $_SERVER['REQUEST_URI'] ?? '/';
            $uri = parse_url($uri, PHP_URL_PATH);
            
            if (isset($routes[$uri])) {
                # code...
                $controllerNom = $routes[$uri]['controller'];
                $controllerAction = $routes[$uri]['action'];

            //     var_dump($routes[$uri]['controller']);
            // die;
                $controller = new $controllerNom();
                $controller->$controllerAction();
            }
        }
    }