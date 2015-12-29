<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use app\models\News;

class NewsController extends Controller
{
    public $layout = 'main.php';

    public function actionIndex()
    {
        $news_model = new News();
        $news = $news_model->getNews();
        return $this->render('index', array('news' => $news));
    }

    public function actionPage($page =  null)
    {
        $news_model = new News();
        $info = $news_model->getInfoById((int)$page);
        if(empty($info)){
            throw new HttpException(404 ,'Page not found');
        }
        return $this->render('news', array('page' => $info));
    }
}
