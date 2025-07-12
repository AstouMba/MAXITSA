<?php 

namespace App\core;

class Validator{

 private static array $error =[];

  public static function isEmail($email){
    if(!is_string($email)){
      return false;

    }
    return filter_var($email, FILTER_VALIDATE_EMAIL)!==false;
    
  }
   public static function isEmpty($val,$key){
     if(empty($val)){
      self::addError($key,"Le champs '$key' est vide");
   }
   }
   public static function getError(): array{
      return self::$error;
   }

   // public static function isValid($value){
   //  return empty(self::$error);
   // }
   public static function isValid(): bool
   {
     return count(self::$error) == 0;
   }

   public static function addError(string $key, string $message){
      self::$error[$key] = $message;
   } 

   public static function resetError(){
      self::$error = [];
   }

}