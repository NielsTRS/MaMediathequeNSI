<?php


namespace Core\Controller;

use Core\App\Controller;


class PageController extends Controller
{
    private $_model;

    public function index()
    {
        $this->render('Page/index', ['title' => 'Page d\'emprunt']);
    }
}