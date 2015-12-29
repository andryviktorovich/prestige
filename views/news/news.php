<?php
use yii\helpers\Url;
$this->title = 'Новости | Prestige Bulding Group';
?>

<section class="content article">
    <h1 class="page__title"><?= isset($page['title']) ? $page['title'] : '';?></h1>
    <?php if(!empty($page['image'])): ?>
        <div class="page__header-img article__header-img" <?= empty($page['image']) ? '' : 'style="background-image: url(' .  Url::toRoute([ '@image_view/' .$page['image']]). '); background-position: 0 center;"' ?>></div>
    <?php endif; ?>
    <div class="article__wrapper text">
        <?php if(!empty($page['image'])): ?>
            <h2 class="article__title"><?= isset($page['title']) ? $page['title'] : '';?></h2>
        <?php endif ?>
        <?= isset($page['description']) ? $page['description'] : ''; ?>
    </div>
</section>
