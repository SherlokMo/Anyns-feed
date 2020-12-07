<?php 

namespace Core;

/**
 * Class Debugger
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core
 */
class Debugger{

    public function printArr($arr)
    {
        echo "<pre>";
        var_dump($arr);
        echo "</pre>";
    }
    public function print(...$element)
    {
        foreach($element as $el){
            echo $el . "<br>";
        }
    }
}

?>