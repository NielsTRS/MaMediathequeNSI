<?php

namespace Core\App;

use Exception;
use PDO;

/**
 * Class Model
 * @package Core\App
 */
abstract class Model
{

    private $_host = '127.0.0.1';
    private $_dbname = 'nsi';
    private $_user = 'niels';
    private $_password = '';

    protected function getDB(): PDO
    {
        try {
            return new PDO("mysql:host=$this->_host;dbname=$this->_dbname", $this->_user, $this->_password);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}