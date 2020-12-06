<?php 
namespace App;
use Core\Router;
use Core\Request;
use Core\Debugger;
/**
 * Class Applecation
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core
 */
class Applecation{
    
    public $Router;
    public $Requests;
    public $Debugger;
    public function __construct()
    {
        $this->Requests = new Request();
        $this->Debugger = new Debugger();
        $this->Router = new Router($this->Requests,$this->Debugger);
    }

    public function run(){
        $this->Router->promise();
    }
}
?>