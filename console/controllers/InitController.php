<?php
namespace console\controllers;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use common\models\User;
class InitController extends \yii\console\Controller{
    
    public function actionUser(){
        echo "Create init User .. \n";
        $username = $this->prompt('Input UserName: ');
        $email = $this->prompt("Input Email for $username :");
        $password = $this->prompt("Input password for $username:");
        
        $model = new User();
        $model->username = $username;
        $model->email = $email;
        $model->password = $password;
        if(!$model->save()){
            foreach($model->getErrors() as $errors){
                foreach ($errors as $e){
                    echo "$e\n";
                }
            }
            return 1;
        }
        return 0;
    }
}

