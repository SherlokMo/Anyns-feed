<?php 

namespace Core\Database\Queries;

use App\Applecation;
use Core\Database\Queries\Insert;

/**
 * Class Query
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core\Database\Queries
 */
class Query extends QueryManager
{
    public $type;
    public $tablename;
    public $params;
    public $queryArrParams;

    protected $query;
    protected $insert;

    private function __construct(string $tablename,array $params,array $queryArrParams)
    {
        $this->tablename = $tablename;
        $this->params = $params;
        $this->queryArrParams = $queryArrParams;

    }
    
    /**
     * Start function
     * Starts a new Query
     *
     * @param string $tablename
     * @param array $params
     * @param array $queryArrParams
     * @return self
     */
    public static function start(string $tablename,array $params,array $queryArrParams): self
    {
        return new self($tablename,$params,$queryArrParams);
    }

    /**
     * starts an insert functionality function
     *
     * @return void
     */
    public function insert()
    {
        $this->type = self::QUERY_INSERT;
        $this->insert = new Insert($this->tablename,$this->params);
        $this->query = $this->insert->buildQuery();
        return $this->endQuery();
    }


    public function endQuery()
    {
        $statement  = $this->prepare($this->query);
        $statement->execute($this->queryArrParams);
    }
}

?>