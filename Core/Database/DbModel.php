<?php 

namespace Core\Database;

use App\Applecation;
use Core\Database\Queries\Query;
use Core\Model;

/**
 * Class DbModel
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core\Database
 */
abstract class DbModel extends Model
{

    abstract public function tablename():string;

    abstract public function params():array;

    public $query;
    
    public function save()
    {
        
        $table = $this->tablename();
        $params = $this->params();
        $arrParams =  $this->getArrayParams($params);
        Query::start($table,$params,$arrParams)->insert();
    }

    /**
     * getProperties function
     *
     * @param array $params
     * @return array
     */
    public function getArrayParams(array $params): array
    {
        $properties = [];
        foreach($params as $attribute){
            $properties[":$attribute"] = $this->{$attribute};
        }
        return $properties;
    }
}

?>