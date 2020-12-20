<?php 

namespace App\Models;

use Core\Model;

class registerModel extends Model
{
    public $firstname = '';
    public $lastname = '';
    public $email = '';
    public $password = '';

    public function rules(): array
    {
        return [
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
}

?>