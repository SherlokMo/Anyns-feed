<?php 

namespace App\Controllers;

use App\Applecation;
use Core\Controller;

/**
 * Class homeController 
 * 
 * controles over home view
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package App
 */
class home extends Controller 
{


    public function home(){

        $paramaters = [
            "name"=>"TEST",
        ];
        echo $this->render("home",$paramaters);
        // ... todo

    }

}

?>