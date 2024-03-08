<?php

namespace App\Model;

class ViewController
{
    protected $view = null;
    protected $error = __DIR__ . "/../../views/404.view.php";
    public function __construct($view)
    {
        $this->view = __DIR__ . "/../../views/{$view}.view.php";
    }

    public function render($data = [])
    {
        if (file_exists($this->view)) {
            extract($data);
            require_once $this->view;
            die();
        }
        require_once $this->error;
    }
}