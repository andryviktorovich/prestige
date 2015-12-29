<?php

namespace app\controllers;

use Yii;
use app\models\ProjectsImages;
use app\models\ProjectsForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;


/**
 * ProjectsImagesController implements the CRUD actions for ProjectsImages model.
 */
class ProjectsImagesController extends Controller
{
    public $layout = 'admin.php';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    return $this->redirect(Url::toRoute(['/admin/login']),302);
                    //throw new \Exception('У вас нет доступа к этой странице');
                },

                'except' => ['login'],
                'rules' => [
                    [
                        'actions' => ['view','index', 'create', 'update', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProjectsImages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ProjectsImages::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectsImages model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProjectsImages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProjectsImages();

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ( $model->imageFile ) {
                $new_file = $model->upload();

                if ( $new_file !== false) {
                    $model->image = $new_file;
                }
                else{
                    unset($model->image);
                }

            } else {
                unset($model->image);
            }
            $model->imageFile = null;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }
            return $this->render('create', [
                'model' => $model,
                'project' => ProjectsForm::find()->all()
            ]);

    }

    /**
     * Updates an existing ProjectsImages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ( $model->imageFile ) {
                $new_file = $model->upload();

                if ( $new_file !== false) {
                    $model->image = $new_file;
                }
                else{
                    unset($model->image);
                }

            } else {
                unset($model->image);
            }
            $model->imageFile = null;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }
            return $this->render('update', [
                'model' => $model,
                'project' => ProjectsForm::find()->all()
            ]);

    }

    /**
     * Deletes an existing ProjectsImages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProjectsImages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectsImages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectsImages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
