<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'О компании';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="company-info-form-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать новую страницу о компании', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'title_menu',
            'url:url',
            //'text:ntext',
            [
                'attribute' => 'active',
                'format' => 'boolean',
            ],
            // 'number',
            // 'dateup',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
