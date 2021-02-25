<?php

namespace Core\App;


abstract class Controller
{

    protected function render(string $fichier, array $data = [])
    {
        extract($data);
        ob_start();
        require_once(ROOT . 'src/View/' . $fichier . '.php');
        $content = ob_get_clean();
        require_once(ROOT . 'src/View/template.php');
    }

}