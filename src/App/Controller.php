<?php

namespace Core\App;


/**
 * Class Controller
 * @package Core\App
 */
abstract class Controller
{

    /**
     * Render the view with params
     * @param string $fichier
     * @param array $data
     */
    protected function render(string $fichier, array $data = [])
    {
        extract($data); // indexes become variables
        ob_start(); // start the output delay
        require_once(ROOT . 'src/View/' . $fichier . '.php');
        $content = ob_get_clean(); // put the content of the generated file in the variable
        require_once(ROOT . 'src/View/template.php'); // show the final page
    }

}