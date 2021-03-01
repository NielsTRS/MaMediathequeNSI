<?php

namespace Core\App;

use Exception;

/**
 * Class Router
 * @package Core\App
 */
class Router
{

    /**
     * @var
     */
    private $_url;
    /**
     * @var array
     */
    private $_routes = [];
    /**
     * @var array
     */
    private $_namedRoutes = [];

    /**
     * Router constructor.
     * @param $url
     */
    public function __construct($url)
    {
        $this->_url = $url;
    }

    /**
     * Add a new route
     * @param $path
     * @param $callable
     * @param $method
     * @return Route
     */
    public function add($path, $callable, $method)
    {
        $route = new Route($path, $callable);
        $this->_routes[$method][] = $route;
        $this->_namedRoutes[$callable] = $route;
        return $route;
    }

    /**
     * Run the router
     * @return mixed
     * @throws Exception
     */
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