<?php 
namespace Core;

use App\Config;

/**
 * Class Request
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core
 */
class Request{

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        if(Config::isApache()){
            $path = str_ireplace("/".Config::projectName."/","",$path);
            if($path === ""){
                $path = "/";
            }
        }
        $pos = strpos($path,'?');
        if(!$pos){
            return $path;
        }
        return substr($path,0,$pos);
    }
    
    public function getMethod()
    {
        /**
         * Returning lowercase because our $route method parameter is lowercase
         */
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

}

?>