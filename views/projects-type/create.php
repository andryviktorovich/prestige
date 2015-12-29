<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProjectsType */

$this->title = 'Create Projects Type';
$this->params['breadcrumbs'][] = ['label' => 'Projects Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
