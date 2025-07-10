<?php
namespace App\Controller;
use App\Core\abstract\AbstractController;
class ControllerSecurity extends AbstractController {

    // private SecurityService $SecurityService;
    public function __construct(){
        $this->baseLayout='login';
        // $this->SecurityService = new SecurityService();
    }

    
    public function create() { 

    }

    public function store() {  
       
        
         $this->renderIndex('login/login.html.php');
    //    header('Location:/login');
         ///header('Location:/login');

    }

    public function inscription(){
        // var_dump('inscription');
        // die;
        $this->renderIndex('login/souscrib.html.php');
        // header('Location:/inscription');
    }
    public function edit() {}
    public function show(){
    }
    public function delete() {
    }
    public function index(){
       
    }

//     public function numeroTelephone(){
//         Validator::resetError();

      
//         if($_SERVER['REQUEST_METHOD']=='POST'){
//             $numeroTelephone=$_POST['numeroTelephone']?? '';
//             $password=$_POST['password']?? '';
 

//             if(Validator::isEmpty($login)){
                
//                 Validator::addError('numeroTelephone', 'le numero est obligatoire');

//             if(Validator::isEmpty($password)){
//                 Validator::addError('password', 'le mot de passe est obligatoire');
                 
//             }

           

//             $errors = Validator::getError();
//             if(empty($errors)){

//                  $result = $this -> SecurityService->seConnecter($login,$password);
                 
                  
//                     if($result){
//                         $session = Session::getInstance();
//                         $session->set('Vendeur', $result);
                        
//                         header('Location:/store');
//                         exit();
//                     }else{
//                         $errors['global']= "login ou mot de passe incorecte";  
//                     }


//             }
//             $this->renderIndex('login/login.html.php', ['error'=>$errors]);
             
//         }else{
//             $this->store();
//         }

//     }
     
//     public function logout() {
//         $session = Session::getInstance();
//         $session->destroy();
//         // session_destroy();
//         // var_dump($session);
//         // die;
//         header('Location:/login');
//         exit();
// }
 }//