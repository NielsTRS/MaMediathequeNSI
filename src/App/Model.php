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

    /**
     * @var string
     */
    private $_host = '127.0.0.1';
    /**
     * @var string
     */
    private $_dbname = 'nsi';
    /**
     * @var string
     */
    private $_user = 'niels';
    /**
     * @var string
     */
    private $_password = '';

    /**
     * Get the connexion with the DataBase
     * @return PDO
     */
    protected function getDB(): PDO
    {
        try {
            return new PDO("mysql:host=$this->_host;dbname=$this->_dbname", $this->_user, $this->_password);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}