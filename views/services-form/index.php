<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Услуги';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-form-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать услугу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'url',
//            'text:ntext',
            [
                'attribute' => 'active',
                'format' => 'boolean',
            ],
            // 'dateup',
            // 'image',
            [
                'label' => 'Изображение',
                'format' => 'raw',
                'value' => function($data){
                    if(empty($data->image)){
                        return '';
                    }
                    return Html::img(Url::toRoute('/public/images/uploads/'.$data->image),[
                        'style' => 'width:150px;'
                    ]);
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
