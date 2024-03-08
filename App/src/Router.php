<?php

namespace App\Src;

class Router
{
    private $request;
    private $uri;
    private $params = [];
    protected $routes = [];
    function __construct()
    {
        // $url = $_GET['url'] ?? '';
        $url = $_SERVER['REQUEST_URI'];
        // var_dump(parse_url($url, PHP_URL_PATH));
        // var_dump($_GET);
        // get each value separated with / into array DIRECTORY_SEPARATOR
        // $url = explode('/', trim(strtolower($url), '/'));
        $this->request = $_SERVER["REQUEST_METHOD"];
        // $this->uri = $url[0];
        $this->uri = parse_url($url, PHP_URL_PATH);
    }

    public function add($request, $uri, $controller, $method)
    {
        $this->routes[] = [
            'request' => $request,
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];

        return $this;
    }

    public function get($uri, $controller, $method)
    {
        return $this->add('GET', $uri, $controller, $method);
    }

    public function post($uri, $controller, $method)
    {
        return $this->add('POST', $uri, $controller, $method);
    }

    public function route()
    {
        foreach ($this->routes as $route) {
            if ($route['request'] === $this->request && $route['uri'] === $this->uri) {
                if (class_exists($route['controller'])) {
                    $controller = new $route['controller'];
                    call_user_func_array([$controller, $route['method']], $this->params);
                    die();
                }
                require_once __DIR__ . "/../../views/404.view.php";
            }
        }
        require_once __DIR__ . "/../../views/404.view.php";
    }
}