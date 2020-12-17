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

    public function render($view, $params = []){
        return Applecation::$app->Router->render($view,$params);
    }

    
}

?>