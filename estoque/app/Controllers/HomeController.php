<?php

namespace App\Controllers;

//Importando classe pai 
use Core\BaseController;

class HomeController extends BaseController{
        
        public function index(){
            
            $this->view->nome = "Thyerre Rangel";
            $this->renderView('home/index.phtml','layout/dashboard.php');
        }

}