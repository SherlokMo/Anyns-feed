<?php 

namespace Core\Database\Queries;

use App\Applecation;

/**
 * Class QueryManager
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core\Database\Queries
 */
class QueryManager
{
    const QUERY_INSERT = "INSERT";
    const QUERY_SELECT = "SELECT";
    const QUERY_UPDATE = "UPDATE";
    const QUERY_DELETE = "DELETE";

    /**
     * prepare function
     *
     * @param string $sql
     * @return void
     */
    public function prepare($sql)
    {
        return Applecation::$app->db->pdo->prepare($sql);
    }

}

?>