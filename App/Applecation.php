<?php 
namespace App;
use Core\Router;
use Core\Request;
use Core\Debugger;
use Core\Response;
use Core\Sanitizer;

/**
 * Class Applecation
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core
 */
class Applecation{
    
    public static $ROOT;
    public $Router;
    public $Requests;
    public $Debugger;
    public $Response;
    public $Sanitizer;

    /**
     * static property of this object instanse.
     * @return object
     */
    public static $app;

    public function __construct($rootPath)
    {
        self::$ROOT = $rootPath;
        $this->Requests = new Request();
        $this->Debugger = new Debugger();
        $this->Response = new Response();
        $this->Sanitizer = new Sanitizer();
        self::$app = $this; 
        $this->Router = new Router($this->Requests,$this->Debugger,$this->Response);
    }

    public function run(){
        echo $this->Router->promise();
    }
}
?>