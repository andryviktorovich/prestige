<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use app\models\Service;

class ServiceController extends Controller
{
    public $layout = 'main.php';

    public function actionIndex()
    {
        $service_model = new Service();
        $services = $service_model->getServices();
        return $this->render('index', array('services' => $services));
    }

    public function actionPage($page =  null)
    {
        $service_model = new Service();
        $info = $service_model->getInfoByUrl($page);
        if(empty($info)){
            throw new HttpException(404 ,'Page not found');
        }
        return $this->render('service', array('page' => $info));
    }
}
