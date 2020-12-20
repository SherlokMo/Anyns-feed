<?php 

namespace App\Controllers;

use App\Applecation;
use App\Models\registerModel;
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
        
        $registerModel = new registerModel();

        if($Request->isPost()){

            $registerModel->loadData($Request->getBody());

            if($registerModel->validate()){
                return "processing";
            }
            return $this->render('register',[
                'model' => $registerModel
            ]);    
        }

        return $this->render('register',[
            'model' => $registerModel
        ]);
    }

}

?>