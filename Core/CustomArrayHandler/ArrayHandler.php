<?php 
namespace Core\CustomArrayHandler;

use Exception;

/**
 * ArrayHandler class
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core\CustomArrayHandler
 */
abstract class ArrayHandler{

    /**
     * cleanArray function
     * cleans array from specific symbols or replacem them with anoter;
     * 
     * @param array $arr
     * @param array $symbols
     * @param string $replacement
     * @return array
     */
    public static function cleanArray(array $arr,array $symbols,string $replacement=""): array
    {
        foreach($arr as $key => $value)
        {
            foreach($symbols as $symbol)
            {
                $arr[$key] = str_replace("$symbol","",$value);
            }
        }
        return $arr;
    }

    /**
     * addToArrayStart method
     * adding specific symbol to every element of an array
     *
     * @param array $arr
     * @param string $symbol
     * @param integer $index
     * @return array
     */
    public static function addToArrayStart(array $arr,string $symbol=":"): array
    {
        foreach($arr as $key => $value)
        {
            $arr[$key] = $symbol.$value;
        }
        return $arr;
    }
}
?>