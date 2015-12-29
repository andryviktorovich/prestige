<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<section class="content article">
    <h1 class="page__title"><?= $exception->statusCode  ?></h1>
    <div class="article__wrapper text">
        <h2 class="article__title"><?= $exception->statusCode == 404 ? 'Страница не найдена' : Html::encode($this->title) ?></h2>

        <?php if($exception->statusCode == 404): ?>
            <h3 class="article__title">Эта страница удалена либо никогда не существовала.</h3>
            <h3 class="article__title">Попробуйте <a href="/">начать с главной</a>.</h3>
        <?php else: ?>
            <h3 class="article__title"> <?= nl2br(Html::encode($message)) ?></h3>
        <?php endif ?>
    </div>
</section>
