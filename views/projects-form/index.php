<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Проекты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-form-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
       Если у проекта не указана главное изображение то, этот проект ну будет выводится на главной странице!
    </p>
    <p>
        <?= Html::a('Создать проект', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'label' => 'Тип',
                'value' => 'type.short_type'
            ],
            'name',
            'url',
            [
                'label' => 'Изображение',
                'format' => 'raw',
                'value' => function($data){
                    if(empty($data->image)){
                        return '';
                    }
                    return Html::img(Url::toRoute('/public/images/projects/'.$data->image),[
                        'style' => 'width:150px;'
                    ]);
                },
            ],
            // 'short_description:ntext',
            // 'description:ntext',
             'active:boolean',
            // 'update',
            // 'create',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
