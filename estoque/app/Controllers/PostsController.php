<?php

namespace App\Controllers;

class PostsController
{

    public function index()
    {
        echo "Posts";
    }
    public function show($id, $request)
    {
        echo "show: " . $id . "<br>";
        echo $request->get->nome."<br>";
        echo $request->get->sobrenome."<br>";
        echo $request->get->idade."<br>";
        
        
    }
}