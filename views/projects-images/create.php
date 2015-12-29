<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProjectsImages */

$this->title = 'Добавление изображения';
$this->params['breadcrumbs'][] = ['label' => 'Дополнительные изображения проекта', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-images-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'project' => $project
    ]) ?>

</div>
