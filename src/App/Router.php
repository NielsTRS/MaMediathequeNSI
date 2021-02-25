<?php

namespace Core\App;

use Exception;

class Router
{

    private $_url;
    private $_routes = [];
    private $_namedRoutes = [];

    public function __construct($url)
    {
        $this->_url = $url;
    }

    public function add($path, $callable, $method)
    {
        $route = new Route($path, $callable);
        $this->_routes[$method][] = $route;
        $this->_namedRoutes[$callable] = $route;
        return $route;
    }

    public function run()
    {
        if (!isset($this->_routes[$_SERVER['REQUEST_METHOD']])) {
            throw new Exception('REQUEST_METHOD does not exist');
        }
        foreach ($this->_routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->_url)) {
                return $route->call();
            }
        }
        throw new Exception('No matching routes');
    }

}