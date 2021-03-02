<?php

namespace Core\App;

use Exception;

/**
 * Class Route
 * @package Core\App
 */
class Route
{

    /**
     * @var string
     */
    private $_path;
    /**
     * @var
     */
    private $_callable;
    /**
     * @var array
     */
    private $_matches = [];
    /**
     * @var array
     */
    private $_params = [];

    /**
     * Route constructor.
     * @param $path
     * @param $callable
     */
    public function __construct($path, $callable)
    {
        $this->_path = trim($path, '/');  // remove unused "/"
        $this->_callable = $callable;
    }

    /**
     * Get the url with the params
     * @param $url
     * @return bool
     */
    public function match($url)
    {
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->_path); // regex in order to get params and call the private function paramMatch
        $regex = "#^$path$#i";
        if (!preg_match($regex, $url, $matches)) {
            return false;
        }
        array_shift($matches); // unstack elements
        $this->_matches = $matches;
        return true;
    }

    /**
     * Call a controller with params
     * @return false|mixed
     */
    public function call()
    {
        if (is_string($this->_callable)) {
            $params = explode('#', $this->_callable);
            $controller = "Core\\Controller\\" . $params[0] . "Controller";
            $controller = new $controller(); // call the controler
            return call_user_func_array([$controller, $params[1]], $this->_matches); // run the function with params
        } else {
            throw new Exception('The callable param is not a controller');
        }
    }

    /**
     * Create regex with params
     * @param $match
     * @return string
     */
    private function paramMatch($match)
    {
        if (isset($this->_params[$match[1]])) {
            return '(' . $this->_params[$match[1]] . ')';
        }
        return '([^/]+)';
    }

}