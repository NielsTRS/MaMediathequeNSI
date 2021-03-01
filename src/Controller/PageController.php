<?php


namespace Core\Controller;

use Core\App\Controller;


class PageController extends Controller
{
    public function index()
    {
        $this->render('Page/index', ['title' => 'Page d\'emprunt']);
    }
}