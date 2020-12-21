<?php 

namespace Core\Database\Queries;

use App\Applecation;
use Core\CustomArrayHandler\ArrayHandler;

/**
 * Class Insert
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core\Database\Queries
 */
class Insert extends Querybuilder
{

    private $params;
    private $tablename;

    public function __construct($tablename,$params)
    {
        $this->params = $params;
        $this->tablename = $tablename;
    }

    

    /**
     * buildQuery function
     * builds the query and return it.
     * 
     * @return string
     */
    public function buildQuery(): string
    {
        return sprintf('INSERT INTO %s (%s) VALUES(%s)',
        $this->tablename,
        implode(',',$this->params),
        implode(',',ArrayHandler::addToArrayStart($this->params))
        );
    }
}

?>