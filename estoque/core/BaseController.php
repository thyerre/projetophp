<?php


namespace Core;

// classe Pai controller
abstract class BaseController
{
    protected $view;
    private $viewPath;

    public function __construct()
    {

        $this->view = new \stdClass;
    }
    //Pegando caminho das view
    protected function renderView($viewPathExterno, $layoutPathExterno = null)
    {

        $this->viewPath = $viewPathExterno;
        $this->layoutPath = $layoutPathExterno;
        if ($layoutPathExterno) {
            $this->layout();
        } else {

            $this->content();
        }

    }
    //Chamando conteúdo
    private function content()
    {

        if (file_exists(__DIR__ . "/../app/Views/{$this->viewPath}")) {
            require_once __DIR__ . "/../app/Views/{$this->viewPath}";
        } else {
            echo "Error: View not found!";
        }
    }

    //Chamando layout
    private function layout()
    {

        if (file_exists(__DIR__ . "/../app/Views/{$this->layoutPath}")) {
            require_once __DIR__ . "/../app/Views/{$this->layoutPath}";
        } else {
            echo "Error: Layout not found!";
        }
    }
}