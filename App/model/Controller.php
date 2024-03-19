<?php

namespace App\Model;

class Controller extends Database{
    protected $view;
    function view($view, $data = [])
    {
        $this->view = new ViewController($view);
        $this->view->render($data);
    }
    function select($query, $data = []){
        $select = $this->conn->execute_query($query, $data)->fetch_assoc();
        return $select;
    }
    function selectall($query, $data = []){
        $select = $this->conn->execute_query($query, $data)->fetch_all(MYSQLI_ASSOC);
        return $select;
    }
}