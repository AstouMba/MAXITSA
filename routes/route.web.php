<?php

    use App\Controller\ControllerSecurity;
    use App\Controller\AccueilController;

    return $routes = [
        // "/" => [
        //     "controller" => ControllerSecurity::class,
        //     "action" => "create"
        // ],
        "/"=>[
            "controller" => ControllerSecurity::class,
            "action" => "show"
        ],
        // "/auth"=>[
        //     "controller" => ControllerSecurity::class,
        //     "action" => "store"
        // ],
        "/inscription"=>[
            "controller" => ControllerSecurity::class,
            "action" => "register"
        ],
        "/accueil"=>[
            "controller" => AccueilController::class,
            "action" => "index"
        ],
        
       
        ];