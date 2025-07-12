<?php
namespace App\Core\abstract;
use App\Core\Session;


 abstract class AbstractController {

 protected $baseLayout = "base";

 public function __construct(){
    Session::getInstance();
}
 
   abstract public function create();
   
   abstract public function store();
   abstract public function edit();
   abstract public function show();
   abstract public function delete();
   abstract public function index();
  

    public function renderIndex(string $view='', array $data=[]){
        // // header( "");
        // extract($data);
        // ob_start();
        // require_once '../templates/'.$view;
       
        // $contentForLayout = ob_get_clean();
        // require_once '../templates/Layout/'.$this->baseLayout.'.layout.php';
        require_once '../templates/'.$view;
    }


    



}
