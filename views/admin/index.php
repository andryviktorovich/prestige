<?php
/**
 * @var yii\web\View $this
 */

use yii\helpers\Url;

$this->title = 'Администрирование';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать в раздел администрирования!</h1>

        <p class="lead">Здесь вы сможете редактировать основной контент сайта.</p>
        <p class="lead">Смотрите в верхнем меню. Там находятся пункты в которых доступно редактирование контента.</p>

        <p><a class="btn btn-lg btn-success" href="<?= Url::toRoute('/companyinfo-form')?>">Предлагаю начать с раздела о компании</a></p>
    </div>


</div>
