<?php

namespace Core\App;


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
     * Get the params from the url
     * @param $url
     * @return bool
     */
    public function match($url)
    {
        $url = trim($url, '/');
        $path = preg_replace_callback('#:([\w]+)#', [$this, 'paramMatch'], $this->_path);
        $regex = "#^$path$#i";
        if (!preg_match($regex, $url, $matches)) {
            return false;
        }
        array_shift($matches);
        $this->_matches = $matches;
        return true;
    }

    /**
     * Call a controller
     * @return false|mixed
     */
    public function call()
    {
        if (is_string($this->_callable)) {
            $params = explode('#', $this->_callable);
            $controller = "Core\\Controller\\" . $params[0] . "Controller";
            $controller = new $controller();
            return call_user_func_array([$controller, $params[1]], $this->_matches);
        } else {
            return call_user_func_array($this->_callable, $this->_matches);
        }
    }

    /**
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