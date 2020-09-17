<?php

namespace Router\Controller;

/**
 * Action
 */
abstract class Action 
{    
    /**
     * view
     *
     * @var mixed
     */
    protected $view;
        
    /**
     * __construct
     *
     * @return mixed
     */
    public function __construct() 
    {
        $this->view = new \stdClass();
    }
    
    /**
     * render
     *
     * @param  mixed $view
     * @param  mixed $layout
     * @return mixed
     */
    protected function render($view, $layout = 'layout')
    {
        $this->view->page = $view;

        if(file_exists("src/Views/" . $layout . ".phtml")) {

            require_once "src/Views/" . $layout . ".phtml";
        }
        
        $this->content();
    }
    
    /**
     * content
     *
     * @return mixed
     */
    protected function content()
    {
        $classAtual = get_class($this);
        $classAtual = str_replace('Src\\Controllers\\', '', $classAtual);
        $classAtual = strtolower(str_replace('Controller', '', $classAtual));
        
        require_once "src/Views/" . $classAtual . "/" . $this->view->page . ".phtml";
    }
}
