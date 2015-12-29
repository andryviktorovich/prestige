<?php

use yii\helpers\Url;
$this->title = 'Новости| Prestige Bulding Group';
?>


<section class="content news">
    <h1 class="page__title">Новости</h1>
    <ul class="news__list">
        <?php foreach($news as $item): ?>
            <li class="news__list__item">
                <a href="<?= Url::toRoute(['news/page', 'page' => $item['id']]); ?>" class="news__list__item__wrapper">
                    <i class="news__list__item__image">
                        <img src="<?= Url::toRoute([ (empty($item['image']) ? '@image_system/default.jpg'  : '@image_view/' .$item['image']) ]);?>" />
                    </i>
                    <strong class="news__list__item__title"><?= $item['title'] ?></strong>
                    <span class="news__list__item__text"><?= $item['short_description'] ?></span>
                </a>
            </li>
        <?php endforeach; ?>

    </ul>
</section>
