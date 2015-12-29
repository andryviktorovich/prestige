<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use app\models\Service;

class ContactsController extends Controller
{
    public $layout = 'main.php';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
