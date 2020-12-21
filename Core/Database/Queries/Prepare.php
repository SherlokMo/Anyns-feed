<?php 
namespace Core\Database\Queries;

use Core\CustomArrayHandler\ExtractFromArray;

/**
 * Class Prepare
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core\Database\Queries
 */
class Prepare extends Query
{

    public function __construct(){}

    public function build()
    {
        if($this->queryType === self::QUERY_INSERT)
        {
            $this->finalStatement = $this->pdo->prepare($this->buildInsertQuery());
            return $this->Execute;
        }
    }
    private function buildInsertQuery()
    {
        return sprintf("INSERT INTO %s (%s) VALUES(%s);", 
            $this->tableName,
            implode(',',$this->attributes),
            implode(',',ExtractFromArray::getKeys($this->arrParams,false))
        );
    }
    
    
}

?>