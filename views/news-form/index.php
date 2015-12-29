<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Url;

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-form-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новую новость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'rowOptions'=>function ($model, $key, $index, $grid){
            $class=$index%2?'odd':'even';
            return [
                'key'=>$key,
                'index'=>$index,
                'class'=>$class
            ];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'short_description:html',

//            'description:ntext',
//            [
//                'attribute' => 'description',
//                'format' => 'html'
//            ],

//            ['class' => CheckboxColumn::className()],

//            'active',

            [
                'attribute' => 'active',
                'format' => 'boolean',
            ],

            // 'dateup',
            [
                'attribute' => 'dateup',
                'format' => ['date', 'php:Y.m.d']
            ],
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
