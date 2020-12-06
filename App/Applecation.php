<?php 
namespace App;
use Core\Router;

/**
 * Class Applecation
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core
 */
class Applecation{
    
    public $Router;

    public function __construct()
    {
        $this->Router = new Router();
        echo "Hello World!";
    }

    public function run(){
        // todo
    }
}
?>