<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class TestController extends Controller
{
    public function actionTestLog(){
        echo '开始';
        Yii::trace('trace开始',__METHOD__);
        Yii::info('这就是个info',__METHOD__);
        Yii::warning('开始提醒了',__METHOD__);
        Yii::error('有点严重了',__METHOD__);
        echo '结束';
        $log=Yii::getFileTarget();
        var_dump($log);

        $time = microtime(true);   
        $log=new \yii\log\FileTarget();
        $log->logFile = Yii::$app->getRuntimePath() . '/logs/test.log'; 
        $log->messages[] = ['test',1,'test',$time];
        var_dump($log);
        $log->export();   
        die;
    }
}
