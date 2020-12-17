<?php
use App\Config;
use Core\Model;

class DB extends Model{
    private static function connect(){
        $pdo = new PDO('mysql:host='.Config::dbInfo['host'].';dbname='.Config::dbInfo['DB_NAME'].';charset=utf8;collation=utf8_unicode_ci', Config::dbInfo['username'], Config::dbInfo['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    public static function query($query, $params = array()){
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        
        if(explode(' ', $query)[0] == 'SELECT'){
        $data = $statement->fetchAll();
        return $data;
        }
    }
}
?>
