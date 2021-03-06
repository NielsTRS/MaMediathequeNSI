<?php


namespace Core\Controller;

use Core\App\Controller;
use Core\Model\BookModel;
use Exception;


/**
 * Class BookController
 * @package Core\Controller
 */
class BookController extends Controller
{
    /**
     * @var BookModel
     */
    private $_model;

    /**
     * BookController constructor.
     */
    public function __construct()
    {
        $this->_model = new BookModel();
    }

    /**
     * Admin page
     * @throws Exception
     */
    public function admin()
    {
        if (UserController::isCurrentAdmin()) {
            $datas = $this->_model->getBooks();
            $this->render('Book/admin', ['datas' => $datas, 'title' => 'Page d\'administration']);
        } else {
            throw new Exception('Vous n\'avez pas les droits');
        }
    }

    /**
     * List books
     */
    public function index()
    {
        if (isset($_POST['recherche'])) {
            if (isset($_POST['query']) and !empty($_POST['query'])) {
                $query = strval($_POST['query']);
                if (isset($_POST['filter']) and !empty($_POST['filter'])) {
                    $filter = intval($_POST['filter']);
                    $datas = $this->_model->getBooksByQueryFiltered($query, $filter);
                } else {
                    $datas = $this->_model->getBooksByQuery($query);
                }
            } else {
                if (isset($_POST['filter']) and !empty($_POST['filter'])) {
                    $filter = intval($_POST['filter']);
                    $datas = $this->_model->getBooksByFilter($filter);
                } else {
                    $datas = $this->_model->getBooks();
                }
            }
        } else {
            $datas = $this->_model->getBooks();
        }
        $this->render('Book/index', ['datas' => $datas, 'query' => (isset($query) ? $query : null), 'filter' => (isset($filter) ? $filter : null), 'title' => 'Recherche']);
    }

    /**
     * Show book informations
     * @param string $isbn
     */
    public function profil(string $isbn)
    {
        $datas = $this->_model->getBookByIsbn($isbn);
        $this->render('Book/profil', ['datas' => $datas, 'title' => 'Profil de livre']);
    }

    /**
     * Delete a book
     * @param string $isbn
     * @throws Exception
     */
    public function delete(string $isbn)
    {
        if (UserController::isCurrentAdmin()) {
            if ($this->_model->deleteBook($isbn)) {
                header('Location: ' . WEB_ROOT . 'livre/admin');
            } else {
                throw new Exception('Erreur');
            }
        } else {
            throw new Exception('Vous n\'avez pas les droits');
        }
    }
}