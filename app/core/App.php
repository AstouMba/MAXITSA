<?php
namespace App\Core;

$dependencies = [
    "core" => [
        "router" => new Router(),
        "database" => Database::getIntance(),
        ],

    "services" => [
        ],
        
    "reporitories" => [
        ],
];