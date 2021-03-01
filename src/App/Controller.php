<?php

namespace Core\App;


/**
 * Class Controller
 * @package Core\App
 */
abstract class Controller
{

    /**
     * Render the view
     * @param string $fichier
     * @param array $data
     */
    protected function render(string $fichier, array $data = [])
    {
        extract($data);
        ob_start();
        require_once(ROOT . 'src/View/' . $fichier . '.php');
        $content = ob_get_clean();
        require_once(ROOT . 'src/View/template.php');
    }

}