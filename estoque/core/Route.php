<?php 

namespace Core;

class Route
{   
    // variavel rotas
    private $routes;

    //construtor 

    public function __construct($routes)
    {

        $this->setRoute($routes);
        $this->run();
    }
    //fim construtor

    //Remonta as rotas em 3 parametros

    private function setRoute($routes)
    {
        foreach ($routes as $route) {
            $explode = explode('@', $route[1]);

            $r = [$route[0], $explode[0], $explode[1]];
            $newRoutes[] = $r;
        }

        $this->routes = $newRoutes;
    }
    //fim

    //função para pegar requisições a url. Tipo GET e POST
    private function getRequest()
    {
        $objRequest = new \stdClass;

        foreach ($_GET as $key => $value) {
            $objRequest->get->$key = $value;
        }
        foreach ($_POST as $key => $value) {
            $objRequest->post->$key = $value;
        }
        return $objRequest;
    }


    //função para pegar URL

    private function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
    //fim

    //função que vai iniciar as outras funções

    private function run()
    {
        $url = $this->getUrl();
        $urlArray = explode('/', $url);


        foreach ($this->routes as $route) {
            $routeArray = explode('/', $route[0]);

            //Comparando se Url tem id e se tem a mesma quantidade de elementos das rotas

            for ($i = 0; $i < count($routeArray); $i++) {
                if (count($urlArray) == count($routeArray)) {
                    if (strpos($routeArray[$i], "{") !== false) {
                        $routeArray[$i] = $urlArray[$i];
                        $param[] = $routeArray[$i];
                    }
                }
                $route[0] = implode($routeArray, '/');
            }//fim

            if ($route[0] == $url) {
               
                // echo $routeArray[1]."<br/>";
                // echo $routeArray[2]."<br/>";                
                // echo $routeArray[3]."<br/>";                                                
                // echo $route[0]."<br/>";
                //  echo $route[1]."<br/>";
                // echo $route[2]."<br/>";
                // echo $param[0]."<br/>";                

                $found = true;
                $nomeController = $route[1];
                $action = $route[2];
                break;

            }
        }
        if ($found == true) {

            //Estanciando controller que vai ser usado

            $controller = Container::newController($nomeController);

            switch (count($param)) {
                case 1:
                    $controller->$action($param[0], $this->getRequest());
                    break;
                case 2:
                    $controller->$action($param[0], $param[1], $this->getRequest());
                    break;
                case 1:
                    $controller->$action($param[0], $param[1], $param[2], $this->getRequest());
                    break;
                default:
                    $controller->$action($this->getRequest());

            }
        } else {
            echo "Página não encontrada!";
        }

    }
    //fim

}