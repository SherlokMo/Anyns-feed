<?php 
namespace Core\Database;

/**
 * Class Database
 * Singleton accross application
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core\Database
 */
class Database
{

    public $pdo;

    /**
     * Database constructor
     */
    public function __construct($config)
    {
        $this->pdo = new \PDO($config['dsn'],$config['user'],$config['password']);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }

}

?>