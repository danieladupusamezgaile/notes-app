<?php

session_start();

use App\Model\Database;
use App\Src\Router;

require __DIR__ ."/../vendor/autoload.php";
require __DIR__ ."/../App/src/config.php";

$db = new Database();

$router = new Router();

require_once __DIR__ . '/../App/src/routes.php';

$router->route();