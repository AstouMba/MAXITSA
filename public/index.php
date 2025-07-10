<?php
    require_once "../vendor/autoload.php";

    use App\Core\Router;

    
    $routes = require_once "../routes/route.web.php";


    Router::resolver($routes);