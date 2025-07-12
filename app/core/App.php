<?php
namespace App\Core;
use App\Core\Router;
use App\Core\Database;
use App\Core\Validator;
class App{
private static $dependencies = [
    "core" => [
        "router" => new Router(),
        "database" => Database::getInstance(),
        "validator" => new Validator(),
        "session" => Session::getInstance(),

        ],

    "services" => [
        ],
        
    "repository" => [
        ],
];

public static function getDependencies($key){
    foreach (self::$dependencies as $value) {
        if (array_key_exists(strtolower($key),$value)) {
                return $value[strtolower($key)];
        }

    }        
return null;
}

}
