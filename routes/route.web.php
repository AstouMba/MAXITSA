<?php

    use App\Controller\ControllerSecurity;
    use App\Controller\CommandeController;

    return $routes = [
        // "/" => [
        //     "controller" => ControllerSecurity::class,
        //     "action" => "create"
        // ],
        "/"=>[
            "controller" => ControllerSecurity::class,
            "action" => "store"
        ],
        "/inscription"=>[
            "controller" => ControllerSecurity::class,
            "action" => "inscription"
        ],
        
       
        ];