<?php

namespace Core\App;


class Route
{

    private $_path;
    private $_callable;
    private $_matches = [];
    private $_params = [];

    public function __construct($path, $callable)
    {
        $this->_path = trim($path, '/');  // remove unused "/"
        $this->_callable = $callable;
    }

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

    private function paramMatch($match)
    {
        if (isset($this->_params[$match[1]])) {
            return '(' . $this->_params[$match[1]] . ')';
        }
        return '([^/]+)';
    }

}