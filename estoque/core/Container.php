<?php

namespace Core;
    //Classe responsavel por estacias os controllers
class Container{

    public static function newController($controller){
       
        $objController = "App\\Controllers\\". $controller;
        
        return new $objController;
    }
}