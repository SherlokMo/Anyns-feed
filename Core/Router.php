<?php 
namespace Core;

/**
 * Class Router
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core
 */
class Router{

    /**
     * Our routes will be an associated Array:
     *      $routes = [
     *          "get"=>[
     *              "Path"=>callback;
     *           ]
     *      ]
     */
    protected $routes = [];

    public function get($path,$callback)
    {
        $this->routes['get'][$path] = $callback;
    }

}

?>