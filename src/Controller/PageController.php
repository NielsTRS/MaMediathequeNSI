<?php


namespace Core\Controller;

use Core\App\Controller;


/**
 * Class PageController
 * @package Core\Controller
 */
class PageController extends Controller
{
    /**
     * Show the main page
     */
    public function index()
    {
        $this->render('Page/index', ['title' => 'Page d\'emprunt']);
    }
}