<?php

namespace App\Model;

class Controller extends Database{
    protected $view;
    function view($view, $data = [])
    {
        $this->view = new ViewController($view);
        $this->view->render($data);
    }
}