<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use Yii;
use vova07\imperavi\actions\GetAction;

class DefaultController extends Controller
{
    public function actions()
    {
        return [
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => yii::$app->homeUrl . '/public/images', // URL адрес папки где хранятся изображения.
                'path' => 'public/images', // Или абсолютный путь к папке с изображениями.
                'type' => GetAction::TYPE_IMAGES,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}