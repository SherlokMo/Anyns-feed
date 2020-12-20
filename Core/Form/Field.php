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
    public const TYPE_TEXT = "text";
    public const TYPE_PASSWORD = "password";
    public const TYPE_EMAIL = "email";

    public $attribute;
    public $type;
    public $model;

    /**
     * Field constructor
     * 
     * @param \Core\Model $model
     * @param string $attribute
     */
    public function __construct(\Core\Model $model, string $attribute)
    {
        $this->attribute = $attribute;
        $this->type = self::TYPE_TEXT;
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

    public function setPasswordField()
    {
        $this->type = SELF::TYPE_PASSWORD;
        return $this;
    }

    public function setEmailField()
    {
        $this->type = SELF::TYPE_EMAIL;
        return $this;
    }
}


?>