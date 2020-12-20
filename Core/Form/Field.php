<?php 

namespace Core\Form;

use function PHPSTORM_META\type;

/**
 * Class Field
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core\Form
 */

class Field
{

    public $attribute;
    public $type;
    public $model;

    /**
     * Field constructor
     * 
     * @param \Core\Model $model
     * @param string $attribute
     */
    public function __construct(\Core\Model $model, string $attribute,string $type)
    {
        $this->attribute = $attribute;
        $this->type = $type;
        $this->model = $model;
    }

    public function __toString()
    {
        return sprintf('
            <lable>%s</lable>
            <br>
            <input name="%s" placeholder="%s" type="%s">
            <p>%s</p>
            <br>
        ',
        $this->attribute,
        $this->attribute,
        $this->attribute,
        $this->type,
        $this->model->getError($this->attribute),
    );
    }
}


?>