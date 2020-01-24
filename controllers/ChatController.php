<?php

namespace app\controllers;

use Yii;

class ChatController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        }
        
        return $this->render('index');
    }

}
