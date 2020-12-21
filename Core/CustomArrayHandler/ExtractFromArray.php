<?php 
namespace Core\CustomArrayHandler;

use App\Applecation;

/**
 * ExtractFromArray class
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core\CustomArrayHandler
 */
class ExtractFromArray extends ArrayHandler
{

    /**
     * getKeys function
     * gives your an array of Keys string name of an array
     * 
     * @param array $arr
     * @param boolean $clean whether you want to clean your array from symbols
     * @param array $symbols symbols you want to clean your array from
     * @return array
     */
    public static function getKeys(array $arr,$clean= true,$symbols = [':']): array
    {
        $Keys = [];

        foreach($arr as $key => $value)
        {
            $Keys[] = $key;
        }
        if($clean)
        {
            return self::cleanArray($Keys,$symbols);
        }
        return $Keys;
    }    
    
}
?>