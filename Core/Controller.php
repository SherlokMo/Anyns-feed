<?php 
namespace Core;

use App\Applecation;

/**
 * Class Controller
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core
 */
class Controller{


    public $layout = "main";

    /**
     * Rendering view
     * 
     * @param string| $view file name
     * @param array| $params array with parameters
     */
    public function render($view, $params = [])
    {
        return Applecation::$app->Router->render($view,$params);
    }

    /**
     * @param string $layout
     */
    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }

    
}

?>