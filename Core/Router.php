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
    public $Response;
    /**
     * routes will be an associated Array:
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

    protected $layout = "main";

    /**
     * Router Constructor 
     * 
     * @param object | \Core\Request $request
     * @param object | \Core\Debugger $debugger
     * @param object | \Core\Response $response
     */
    public function __construct(\Core\Request $request,\Core\Debugger $debugger,\Core\Response $response)
    {
        $this->Request = $request;
        $this->Debugger = $debugger;
        $this->Response = $response;
    }

    /**
     * Get method adds new get index to routes
     * @return void
     */
    public function get($path,$callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    /**
     * Post method adds new post index to routes
     * @return void
     */
    public function post($path, $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }
    
    /**
     * Resolves page output
     * @return callback|string
     */
    public function promise()
    {
        $path = $this->Request->getPath();
        $method = $this->Request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if(!$callback)
        {
            $this->Response->setStatusCode(404);
            return $this->layoutRender("_404");
        }
        if(is_string($callback))
        {
            return $this->render($callback);
        }
        if(is_array($callback))
        {

            /**
             * Instance of controller that Applecation has
             */
            Applecation::$app->Controller = new $callback[0](); 

            /**
             * creating an instance of the object to avoide Using $this when not in object context on Controllers
             */
            $callback[0] = Applecation::$app->Controller;
        }
        return call_user_func($callback,$this->Request,$this->Debugger);
    }
    
    /**
     * replacing the buffered content with the view content
     * @return string page content after replacement
     */
    public function render($view,$params = []): string
    {
        $templateContent = $this->templateRender();
        $viewContent = $this->viewContent($view,$params);
        return str_replace("{{content}}",$viewContent,$templateContent);
    }

    public function layoutRender($view){
        $params = [];
        return $this->viewContent($view,$params);
    }
    /**
     * buffering content from the template layout ( we dont want HTML duplications )
     * @return string  (HTML code)
     */
    protected function templateRender(): string
    {
        $layout = Applecation::$app->Controller->layout;
        ob_start();
        include_once Applecation::$ROOT."/public/layout/$layout.php";
        return ob_get_clean();
    }

    /**
     * buffering view Content (Data we actually are looking for)
     * @return string (HTML code)
     */
    protected function viewContent($view, $params): string
    {

        foreach($params as $key => $value)
        {
            /**
             * Variable variable  ($$)
             * if key is name and value is mohammad then it is as declearing:
             * $name = mohammad
             */
            $$key = $value;
        }

        ob_start();
        include_once Applecation::$ROOT."/App/Views/$view.php";
        return ob_get_clean();
    }

}

?>