<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Дополнительные изображения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-images-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить изображение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'project.name',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
