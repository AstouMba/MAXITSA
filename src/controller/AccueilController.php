<?php
namespace App\Controller;
use App\Core\abstract\AbstractController;

class AccueilController extends AbstractController
{
    protected function render($view)
    {
        // Simple example: include the view file
        require_once '../templates/'.$view;
    }

    public function index()
    {
        $this->render("Page/accueil.html.php");
    }
     public function edit() {}
    public function show(){
    }
    public function delete() {
    }
    public function create() { 

    }

    public function store() {  
}
}