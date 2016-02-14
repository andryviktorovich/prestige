<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectsImages */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Дополнитльные изображения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-images-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'project.name',
            [
                'label' => 'Изображение на главной',
                'value' => empty($model->image) ? '' : Html::img(Url::toRoute('/public/images/projects/'.$model->image),[
                    'style' => 'width:150px;'
                ]),
                'format'=> 'html',
            ],
        ],
    ]) ?>

</div>
