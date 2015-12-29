<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NewsForm */
/* @var $form yii\widgets\ActiveForm */

use kartik\date\DatePicker;
use vova07\imperavi\Widget;
use yii\helpers\Url;
?>

<div class="news-form-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'short_description')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'imageManagerJson' => Url::to(['/project/images-get']),
            'imageUpload' => Url::to(['/project/image-upload']),
            'plugins' => [
                'clips',
                'fullscreen',
                'imagemanager',
            ],

        ]
    ]); ?>

<!--    --><?//= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'imageManagerJson' => Url::to(['/project/images-get']),
            'imageUpload' => Url::to(['/project/image-upload']),
            'plugins' => [
                'clips',
                'fullscreen',
                'imagemanager',
            ],

        ]
    ]); ?>

    <?= $form->field($model, 'active')->checkbox(); ?>

    <?= $form->field($model, 'dateup')->widget(DatePicker::className(), [
        'options' => ['placeholder' => 'Введите дату ...'],
//        'type' => DatePicker::TYPE_INPUT,
        'pluginOptions' => [
            'format' => 'yyyy-m-dd',
            'todayHighlight' => true,
            'autoclose'=>true,
        ]
    ]); ?>

<!--    --><?//= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
