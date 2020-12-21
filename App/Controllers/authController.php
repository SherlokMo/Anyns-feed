<?php 

namespace App\Controllers;

use App\Applecation;
use App\Models\User;
use Core\Controller;

/**
 * Class homeController 
 * 
 * controles over home view
 * 
 * @author Mohammad Salah <redmohammad22@gmail.com>
 * @package App
 */
class authController extends Controller 
{


    public function register(\Core\Request $Request){
        
        $user = new User();

        if($Request->isPost()){

            $user->loadData($Request->getBody());

            if($user->validate() && $user->register()){
                return "processing";
            }

            return $this->render('register',[
                'model' => $user
            ]);    
        }

        return $this->render('register',[
            'model' => $user
        ]);
    }

}

?>