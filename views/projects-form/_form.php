<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ProjectsForm */
/* @var $form yii\widgets\ActiveForm */
/* @var $type app\models\ProjectsType */


use kartik\date\DatePicker;
use vova07\imperavi\Widget;
use yii\helpers\Url;

?>

<div class="projects-form-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'type_id')->textInput() ?>
    <?= $form->field($model, 'type_id')->dropDownList(
        ArrayHelper::map($type, 'id', 'type')) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
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

                'table',
                'textexpander'
            ],

        ]
    ]); ?>

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
                'table',
                'textexpander'
            ],

        ]
    ]); ?>

    <?= $form->field($model, 'active')->checkbox(); ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
<!---->
<!--    --><?//= $form->field($model, 'update')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'create')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
