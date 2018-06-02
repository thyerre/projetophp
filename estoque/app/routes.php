<?php
//Rotas 

$routes[] = ['/','HomeController@index'];
$routes[] = ['/posts','PostsController@index'];
$routes[] = ['/post/{id}/show','PostsController@show'];

return $routes;
