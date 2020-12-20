<?php 

namespace App\Controllers;

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


    public function home(\Core\Request $Request){

        $paramaters = [
            "name"=>"TEST",
        ];
        if($Request->isPost()){
            return "I AM HANDLING YOUR ACTION!";
        }
        return $this->render('home',$paramaters);
        // ... todo

    }

}

?>