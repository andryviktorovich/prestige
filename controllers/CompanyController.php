<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use app\models\Company;
use app\models\ContactForm;

class CompanyController extends Controller
{
    public $layout = 'main.php';

    public function actionIndex($page =  null)
    {
        $company = new Company();
        $info = $company->getInfoByUrl($page);

        if(empty($info)){
            throw new HttpException(404 ,'Page not found');
        }
        return $this->render('index', array('page' => $info));
    }
}
