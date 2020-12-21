<?php 
namespace App;

/**
 * Class Config
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package App
 */
class Config {
    
    /**
     * apache config for Routes fixing
     */
    const localEnviroment = TRUE;

    /**
     * Project Name
     */
    const directory = "Anyns-feed";

    public static function isApache(){
        if(Config::localEnviroment){
            return true;
        }
        return false;
    }

    public static function getDB()
    {
         return [
            'dsn' => $_ENV['DB_DSN'],
            "user" => $_ENV['DB_USER'],
            "password" => $_ENV['DB_PASSWORD']
        ];    
    }
}
?>