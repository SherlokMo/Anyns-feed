<?php 
namespace Core;

use App\Applecation;
use App\Config;

/**
 * Class Request
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core
 */
class Request
{

    /**
     * Returns path name
     * @return string
     */
    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        if(Config::isApache()){
            $path = $this->getApachePath($path);
        }
        $pos = strpos($path,'?');
        if(!$pos){
            return $path;
        }
        return substr($path,0,$pos);
    }
    
    /**
     * Returns Path on Apache
     * 
     * @return string
     */
    private function getApachePath($path)
    {
        $path = str_ireplace("/".Config::directory."/","",$path);
        if($path === "" || $path[0] === "?")
        {
            return "/";
        }
        return str_ireplace("/","",$path);
    }

    /**
     * Returns method type
     * 
     * @return string
     */
    public function getMethod(): string
    {
        /**
         * Returning lowercase because our $route method parameter is lowercase
         */
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * isGet Method
     * 
     * @return bool
     */
    public function isGet(): bool
    {
        if($this->getMethod() === "get")
        {
            return true;
        }
        return false;
    }

    /**
     * isPost Method
     * 
     * @return bool
     */
    public function isPost(): bool
    {
        if($this->getMethod() === "post")
        {
            return true;
        }
        return false;
    }

    /**
     * Returns request body but sanitaized ( Without special chars )
     * 
     * @return array
     */
    public function getBody(): array
    {
        $body = [];
        if($this->getMethod() === 'get')
        {

            foreach($_GET as $key => $value)
            {
                $body[$key] = Applecation::$app->Sanitizer->xss_clean($value);
            }

        }

        if($this->getMethod() === 'post')
        {

            foreach($_POST as $key => $value)
            {
                $body[$key] = Applecation::$app->Sanitizer->xss_clean($value);
            }
            
        }

        return $body;
    }

}

?>