<?php 
namespace Core;

use App\Applecation;

/**
 * Class Model
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package Core
 */

abstract class Model{

    public const RULES = [
        'REQUIRED' => "required",
        'EMAIL' => "email",
        'MIN' => 'min',
        'MAX' => 'max',
        "MATCH" => "match"
    ];

    /**
     * 
     * @param array $data
     * 
     * @return void
     */
    public function loadData(array $data): void
    {
        foreach($data as $key => $value){

            /**
             * to avoid PHP errors in the futuer for example:
             * Somebody sends a parameter that does not exist as a property on the (x) model
             * 
             * @param object | $this is the child class instanse;
             */
            if(property_exists($this,$key)){
                $this->$key = $value;
            }

        }
    }

    abstract public function rules(): array;

    public $errors = [];

    public function validate(): bool
    {
        foreach($this->rules() as $parameter => $rules){ // iterating over every post parameter
            $value = $this->$parameter;
            foreach($rules as $rule){ // iterating over every rule of the rules
                $ruleName = $rule;
                if(!is_string($ruleName)){
                    $ruleName = $rule[0];
                }
                if($ruleName === self::RULES['REQUIRED'] && !$value){
                    $this->addError($parameter,self::RULES['REQUIRED']);
                }
                elseif($ruleName === self::RULES['EMAIL'] && !filter_var($value,FILTER_VALIDATE_EMAIL)){
                    $this->addError($parameter,self::RULES['EMAIL']);
                }
                elseif($ruleName === self::RULES['MIN'] && strlen($value) < $rule['min']){
                    $this->addError($parameter,self::RULES['MIN'], $rule);
                }
                elseif($ruleName === self::RULES['MAX'] && strlen($value) > $rule['max']){
                    $this->addError($parameter,self::RULES['MAX'], $rule);
                }
                elseif($ruleName == self::RULES['MATCH'] && $value !== $this->{$rule['match']} )
                {
                    $this->addError($parameter,self::RULES['MATCH'], $rule);
                } 
            }            

        }
        
        return empty($this->errors);
    }

    public function addError($parameter, $rule, $errParams = []): void
    {
        $message = $this->errorMessages()[$rule] ?? '';

        foreach($errParams as $key => $value){
            $message = str_replace("{{$key}}",$value,$message);
        }

        /**
         * empty bracket adds an auto increasment index to the array
         */
        $this->errors[$parameter][] = $message; 
    }

    /**
     * @param string $lang as language base
     * 
     * @return array | error messages
     */
    public function errorMessages(string $lang = "EN"): array
    {
        return [
            self::RULES['REQUIRED'] => "This field cannot be blank",
            self::RULES['EMAIL'] => "This field must be a valid email address",
            self::RULES['MIN'] => "This field must not be less than {min} characters",
            self::RULES['MAX'] => "This field must not be larger than {max} characters",
            self::RULES['MATCH'] => "This field must match {match}"
        ];
    }

    /**
     * @param string parameter is the attribute
     * 
     * @return bool
     */
    public function hasError($parameter)
    {
        return $this->errors[$parameter] ?? FALSE;
    }

    /**
     * @param string parameter is the attribute
     * @return string
     */
    public function getError($parameter): string
    {
        return $this->hasError($parameter) ? $this->errors[$parameter][0] : "";
    }
}

?>