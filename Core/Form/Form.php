<?php 

namespace Core\Form;

/**
 * Class Debugger
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core\Form
 */

class Form
{

    protected $action;
    protected $method;

    /**
     * Form constructor starts a new form
     * 
     * @param string $action
     * @param string $method
     */
    public function __construct(string $action= "", string $method="GET")
    {
        $this->action = $action;
        $this->method = $method;
        echo $this->start();
    }

    /**
     * Starts a form
     * 
     * @return string
     */
    public function start(): string
    {

        return "<form action='{$this->action}' method='{$this->method}'>";
    }
    
    /**
     * Ends the form
     * 
     * @return string
     */
    public function end(): string
    {
        return "</form>";
    }

    /**
     * @return \Core\Form\Field
     */
    public function field($model,$attribute,$type="text"): \Core\Form\Field
    {
        return new Field($model,$attribute,$type);
    }

}


?>