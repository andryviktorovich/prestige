<?php
use yii\helpers\Url;

$this->title = 'Услуги | Prestige Bulding Group';
?>

<section class="content services">
    <h1 class="page__title">Услуги</h1>
    <ul class="services__list">
        <?php foreach($services as $item):?>
            <li class="services__list__item" >
                <a href="<?= Url::toRoute(['service/page', 'page' => $item['url']]); ?>">
                    <div class="services__list__item__wrapper">
                        <img src="<?= Url::toRoute([ (empty($item['image']) ? '@image_system/default.jpg'  : '@image_view/' .$item['image']) ]);?>" class="services__list__item__image" />
                        <p class="services__list__item__title"><?= $item['title']?></p>
                    </div>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>