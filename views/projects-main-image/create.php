<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProjectsMainImage */

$this->title = 'Добавление нового основного изображения';
$this->params['breadcrumbs'][] = ['label' => 'Основные изображения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-main-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'project' => $project
    ]) ?>

</div>
