<?php

$router->get("/", 'App\Controllers\\IndexController', 'index');
$router->get("/register", 'App\Controllers\Authentication\\RegisterController', 'index');
$router->get("/authenticate", 'App\Controllers\Authentication\\AuthenticateController', 'index');

$router->post("/authenticate", 'App\Controllers\Authentication\\AuthenticateController', 'login');
$router->post("/register", 'App\Controllers\Authentication\\RegisterController', 'store');
$router->get("/logout", 'App\Controllers\Authentication\\AuthenticateController', 'logout');

$router->get("/notes", 'App\Controllers\Notes\\NotesController', 'index');
$router->get("/notes/create", 'App\Controllers\Notes\\NotesController', 'create');
$router->post("/notes/create", 'App\Controllers\Notes\\NotesController', 'store');
