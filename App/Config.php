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
     * Host name is localhost on local enviroment
     */
    const host = "localhost";

    const dbname = "DB_NAME";

    const username = "root";

    const password = "";

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
}
?>