<?php 
namespace Core;

/**
 * Class Router
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core
 */
class Router{

    public $Request;
    public $Debugger;

    /**
     * Our routes will be an associated Array:
     *      $routes = [
     *          "get" => [
     *              "Path"=>callback,
     *               ....
     *           ],
     *          "post" => [
     *              "Path" => callback,
     *              ....
     *           ]
     *      ]
     */
    protected $routes = [];

    /**
     * Router Constructor 
     * 
     * @param object | \Core\Request $request
     * @param object | \Core\Debugger $debugger
     */
    public function __construct(\Core\Request $request,\Core\Debugger $debugger)
    {
        $this->Request = $request;
        $this->Debugger = $debugger;
    }

    public function get($path,$callback)
    {
        $this->routes['get'][$path] = $callback;
    }
    
    public function promise(){

        $path = $this->Request->getPath();
        $method = $this->Request->getMethod();
        $this->Debugger->printArr($path);

    }

}

?>