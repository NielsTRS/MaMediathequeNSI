<?php


namespace Core\Controller;

use Core\App\Controller;
use Core\Model\TakeModel;
use Exception;


/**
 * Class TakeController
 * @package Core\Controller
 */
class TakeController extends Controller
{
    /**
     * @var TakeModel
     */
    private $_model;

    /**
     * TakeController constructor.
     */
    public function __construct()
    {
        $this->_model = new TakeModel();
    }

    /**
     * List the taken books
     */
    public function index()
    {
        $datas = $this->_model->getTakes();
        $this->render('Take/index', ['datas' => $datas, 'title' => 'Page d\'emprunt']);
    }

    /**
     * Admin page
     * @throws Exception
     */
    public function admin()
    {
        if (UserController::isCurrentAdmin()) {
            $datas = $this->_model->getTakes();
            $this->render('Take/admin', ['datas' => $datas, 'title' => 'Page d\'administration']);
        } else {
            throw new Exception('Vous n\'avez pas les droits');
        }
    }

    /**
     * Add a book to the list of taken
     * @param string $isbn
     * @throws Exception
     */
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

    /**
     * Delete a taken book
     * @param string $isbn
     * @throws Exception
     */
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