<?php


namespace Core\Controller;

use Core\App\Controller;
use Core\Model\BookModel;
use Exception;


class BookController extends Controller
{
    private $_model;

    public function __construct()
    {
        $this->_model = new BookModel();
    }

    public function index()
    {
        $datas = $this->_model->getBooks();
        $this->render('Book/index', ['datas' => $datas, 'title' => 'Page d\'accueil']);
    }

    public function search()
    {
        if (isset($_POST['query']) and !empty($_POST['query'])) {
            $query = strval($_POST['query']);
            $datas = $this->_model->getBooksByQuery($query);
            $this->render('Book/recherche', ['datas' => $datas, 'query' => $query, 'title' => 'Résultat de recherche']);
        } else {
            throw new Exception('Erreur');
        }
    }

    public function delete(string $isbn)
    {
        if (UserController::isCurrentAdmin()) {
            if ($this->_model->deleteBook($isbn)) {
                header('Location: ' . WEB_ROOT);
            } else {
                throw new Exception('Erreur');
            }
        } else {
            throw new Exception('Vous n\'avez pas les droits');
        }
    }
}