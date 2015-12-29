<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Project;
use app\models\ContactForm;
use vova07\imperavi\actions\GetAction;
use app\models\UploadForm;
use yii\web\UploadedFile;

class ProjectController extends Controller
{
    public $layout = 'main.php';

//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout'],
//                'rules' => [
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post'],
//                ],
//            ],
//        ];
//    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'view' => [
                'class' => 'yii\web\ViewAction',
                'viewPrefix' => '',
            ],
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => Yii::$app->request->hostInfo  . '/public/images/uploads', // URL адрес папки где хранятся изображения.
                'path' => '@image', // Или абсолютный путь к папке с изображениями.
                'type' => GetAction::TYPE_IMAGES,
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => Yii::$app->request->hostInfo  . '/public/images/uploads', // URL адрес папки куда будут загружатся изображения.
                'path' => '@image' // Или абсолютный путь к папке куда будут загружатся изображения.
            ],
        ];
    }

    public function actionIndex()
    {
        $this->view->params['header_transparent'] = true;
        $this->view->params['footer'] = false;
        return $this->render('index');
    }

    public function actionPage($page = ''){
        $this->view->params['footer'] = false;
        $project = new Project();
        $info_project = $project->getProjectByUrl($page);
        if(empty($info_project)){
            throw new HttpException(404 ,'Page not found');
        }
        $images_main = $project->getImagesByProjectUrl($page);
        $images_addit = $project->getImagesByProjectUrlAddit($page);
        $image_all = array_merge($images_main,$images_addit);
        $next = $project->getNextProjects($info_project['id']);
        $prev = $project->getPrevProjects($info_project['id']);



        return $this->render('project', array(  'page' => $info_project,
                                                'images_main' => $images_main,
                                                'image_all' => $image_all,
                                                'next' => $next,
                                                'prev' => $prev));
    }

    public function actionGetprojects()
    {
        header("Access-Control-Allow-Origin: *");

        $this->layout = false;

        $projetModel = new Project();
        $projects = $projetModel->getProjects();
        $result = array();
        foreach($projects as $item){
            $result[] = array(
                'id' => $item['id'],
                'image' => '/public/images/projects/'.$item['image'],
                'preview' => '/public/images/projects/'.$item['image'],
                'type' => $item['type'],
                'type_short' => $item['short_type'],
                'name' => $item['name'],
                'review' => $item['short_description'],
                'link' => Url::toRoute(['project/page', 'page' => $item['url']]),
            );
        }
        echo  json_encode($result);
    }

    public function actionGetprojectImages($page)
    {
        header("Access-Control-Allow-Origin: *");

        $this->layout = false;

        $projetModel = new Project();
        $projects = $projetModel->getImagesByProjectUrl($page);
        $result = array();
        $pr = $projetModel->getProjectByUrl($page);
        if(!empty($pr['image'])) {
            $result[] = array(
                'id' => $pr['id'],
                'image' => '/public/images/projects/' . $pr['image'],
                'preview' => '/public/images/projects/' . $pr['image'],
            );
        }
        foreach($projects as $item){
            $result[] = array(
                'id' => $item['id'],
                'image' => '/public/images/projects/'.$item['image'],
                'preview' => '/public/images/projects/'.$item['image'],
            );
        }
        echo  json_encode($result);
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return ;
            }
            else{
                return 'error';
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
//    public function actionLogin()
//    {
//        if (!\Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        }
//        return $this->render('login', [
//            'model' => $model,
//        ]);
//    }
//
//    public function actionLogout()
//    {
//        Yii::$app->user->logout();
//
//        return $this->goHome();
//    }
//
//    public function actionContact()
//    {
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
//            Yii::$app->session->setFlash('contactFormSubmitted');
//
//            return $this->refresh();
//        }
//        return $this->render('contact', [
//            'model' => $model,
//        ]);
//    }
//
}
