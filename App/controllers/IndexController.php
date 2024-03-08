<?php

namespace App\Controllers;
use App\Model\Controller;

class IndexController extends Controller{
    function index(){
        $this->view("index", ['title' => 'Home']);
    }
}