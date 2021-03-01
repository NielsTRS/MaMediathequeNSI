<?php


namespace Core\Controller;

use Core\App\Controller;
use Core\Model\TakeModel;
use Exception;


class TakeController extends Controller
{
    private $_model;

    public function __construct()
    {
        $this->_model = new TakeModel();
    }

    public function index()
    {
        $datas = $this->_model->getTakes();
        $this->render('Take/index', ['datas' => $datas, 'title' => 'Page d\'emprunt']);
    }

    public function admin()
    {
        if (UserController::isCurrentAdmin()) {
            $datas = $this->_model->getTakes();
            $this->render('Take/admin', ['datas' => $datas, 'title' => 'Page d\'administration']);
        } else {
            throw new Exception('Vous n\'avez pas les droits');
        }
    }

    public function getUserTakes(string $code)
    {
        if (UserController::isConnected()) {
            $datas = $this->_model->getByUserCode($code);
            $this->render('Take/index', ['datas' => $datas, 'title' => 'Page d\'emprunt']);
        } else {
            throw new Exception('Veuillez vous connecter');
        }

    }

    public function add(string $isbn)
    {
        if (UserController::isConnected()) {
            $date = date('Y-m-d', strtotime(date('Y-m-d') . ' + 15 days'));
            $this->_model->createTake($_SESSION['code'], $isbn, $date);
            header('Location: ' . WEB_ROOT . 'profil/' . $_SESSION['code']);
        } else {
            throw new Exception('Veuillez vous connecter');
        }
    }

    public function delete(string $isbn)
    {
        if (UserController::isCurrentAdmin()) {
            $this->_model->removeTake($isbn);
            header('Location: ' . WEB_ROOT . 'emprunt/admin');
        } elseif (UserController::isConnected()) {
            $this->_model->removeTake($isbn, $_SESSION['code']);
            header('Location: ' . WEB_ROOT . 'profil/' . $_SESSION['code']);
        } else {
            throw new Exception('Veuillez vous connecter');
        }
    }
}