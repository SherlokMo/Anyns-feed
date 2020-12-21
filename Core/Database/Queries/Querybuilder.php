<?php 

namespace Core\Database\Queries;

use App\Applecation;

/**
 * Class Querybuilder
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core\Database\Queries
 */
abstract class Querybuilder
{
    abstract public function buildQuery(): string;
}

?>