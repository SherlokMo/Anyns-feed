<?php 
namespace Core;

use App\Applecation;

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
     * $routes will be an associated Array:
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
    
    public function promise()
    {
        $path = $this->Request->getPath();
        $method = $this->Request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if(!$callback){
            return "Page Not found";
        }
        if(is_string($callback)){
            return $this->render($callback);
        }
        return call_user_func($callback);
    }
    
    /**
     * replacing the buffered content with the view content
     */
    public function render($view)
    {
        $templateContent = $this->templateRender();
        $viewContent = $this->viewContent($view);
        return str_replace("{{content}}",$viewContent,$templateContent);
    }

    /**
     * buffering content from the template layout ( we dont want HTML duplications )
     */
    protected function templateRender()
    {
        ob_start();
        include_once Applecation::$ROOT."/public/layout/main.php";
        return ob_get_clean();
    }

    /**
     * buffering view Content (Data we actually looking for)
     */
    protected function viewContent($view)
    {
        ob_start();
        include_once Applecation::$ROOT."/App/Views/$view.php";
        return ob_get_clean();
    }

}

?>