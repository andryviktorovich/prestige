<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectsForm */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Проекты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-form-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот проект?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type.type',
            'name',

            'url',
            [
                'label' => 'Изображение на главной',
                'value' => empty($model->image) ? '' : Html::img(Url::toRoute('/public/images/projects/'.$model->image),[
                    'style' => 'width:150px;'
                ]),
                'format'=> 'html',
            ],
            'short_description:html',
            'description:html',
            'active:boolean',
            'number:integer'
        ],
    ]) ?>

</div>
