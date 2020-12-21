<?php 

namespace App\Models;

use Core\Database\DbModel;
use Core\Model;

class User extends DbModel
{
    public $username = '';
    public $firstname = '';
    public $lastname = '';
    public $email = '';
    public $password = '';

    /**
     * rules function
     * returns fields rules (to validate)
     * 
     * @return array
     */
    public function rules(): array
    {
        return [
            "username"=>[
                self::RULES['REQUIRED'],
                [self::RULES['MIN'], 'min'=>3],
                [self::RULES['MAX'], 'max'=>18]
            ],
            "firstname"=>[
                self::RULES['REQUIRED'],
                [self::RULES['MIN'], 'min'=>3],
                [self::RULES['MAX'], 'max'=>26]
            ],
            "lastname"=>[
                self::RULES['REQUIRED'],
                [self::RULES['MIN'], 'min'=>3],
                [self::RULES['MAX'], 'max'=>26]
            ],
            "email"=>[
                self::RULES['REQUIRED'],
                self::RULES['EMAIL']
            ],
            "password"=>[
                self::RULES['REQUIRED'],
                [self::RULES['MIN'],'min'=>8]
            ],
        ];
    }
    
    /**
     * tablename function
     *
     * @return string
     */
    public function tablename(): string
    {
        return "users";
    }

    public function register()
    {
        $this->password = password_hash($this->password,PASSWORD_BCRYPT);
        return $this->save();
    }

    public function params(): array
    {   
        return [
            'username',
            'firstname',
            'lastname',
            'email',
            'password',
        ];
    }
}

?>