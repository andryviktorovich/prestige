<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
<title><?= Html::encode($this->title) ?></title>
<?php require('template/head.inc'); ?>
<body>
<!-- Page -->
<div class="page" id="root">
    <?php include('template/slider-nav-item.inc'); ?>
    <?php include('template/slider-item.inc'); ?>

    <?php include('template/header.inc'); ?>

    <?= $content ?>



</div>
<!--/Page -->

<!-- JS -->
<?php include('template/scripts.inc'); ?>
<!--/JS -->

</body>
</html>
<?php $this->endPage() ?>