<?php

$router->get("/", 'App\Controllers\\IndexController', 'index');
$router->get("/register", 'App\Controllers\Authentication\\RegisterController', 'index');
$router->get("/authenticate", 'App\Controllers\Authentication\\AuthenticateController', 'index');
