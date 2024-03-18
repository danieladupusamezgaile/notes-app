<?php

$router->get("/", 'App\Controllers\\IndexController', 'index');
$router->get("/register", 'App\Controllers\Authentication\\RegisterController', 'index');
$router->get("/authenticate", 'App\Controllers\Authentication\\AuthenticateController', 'index');
$router->get("/notes", 'App\Controllers\Notes\\NotesController', 'index');

$router->post("/authenticate", 'App\Controllers\Authentication\\AuthenticateController', 'login');
$router->post("/register", 'App\Controllers\Authentication\\RegisterController', 'store');

$router->get("/logout", 'App\Controllers\Authentication\\AuthenticateController', 'logout');
