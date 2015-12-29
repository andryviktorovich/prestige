<?php
use yii\helpers\Url;
    $this->title = $page['name'] . ' | Prestige Bulding Group';
?>
<!--<section class="content article">-->
<!--    <div class="article__wrapper text">-->
<!--        <h1>--><?//= $page['type'] . ' «' . $page['name'] . '»'?><!--</h1>-->
<!--        --><?//= $page['description']?>
<!--    </div>-->
<!--</section>-->
<section class="content article">
    <!-- Folio Slider -->

    <div class="article__slider-container">
        <h1 class="page__title"><?= isset($page['name']) ? $page['name'] : '';?></h1>
        <?php if(!empty($images_main) || !empty($page['image'])): ?>
            <section class="folio-slider folio-slider_no-backout" data-type="vertical" data-url="<?= Url::toRoute(['/project/getproject-images' , 'page' => $page['url']]);?>">

                <div class="folio-slider__loader">
                    <svg class="folio-slider__loader__spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="folio-slider__loader__spinner__circle" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg>
                </div>
                <!-- Folio Slider Naviation Arrows -->
                <span class="folio-slider__nav__arrow folio-slider__nav__arrow_left"></span>
                <span class="folio-slider__nav__arrow folio-slider__nav__arrow_right"></span>
                <!-- /Folio Slider Naviation Arrows -->

                <div class="folio-slider__content folio-slider__content_no-padding">

                </div>
                <!-- Slider Nav -->
                <section class="folio-slider__nav folio-slider__nav_vertical">
                    <div class="folio-slider__nav__inner">

                    </div>
                </section>
                <!-- /Slider Nav -->

            </section>
        <?php endif; ?>
        <!-- /Folio Slider -->
    </div>
    <div class="nav-panel">
        <a href="<?= Url::toRoute(['/project/page' , 'page' => $prev['url']]);?>" class="nav-panel__link nav-panel__link_prev"></a>
        <span class="nav-panel__link nav-panel__link_bottom"></span>
        <a href="<?= Url::toRoute(['/project/page' , 'page' => $next['url']]);?>" class="nav-panel__link nav-panel__link_next"></a>
    </div>
    <div class="article__wrapper text">
        <h2 class="article__title"><?= $page['name']?></h2>
        <?= $page['description']?>
    </div>
    <div class="article__wrapper project-images">
        <?php foreach($image_all as $item): ?>
            <a href="<?= Url::toRoute(['/public/images/projects/'.$item['image']]);?>" class="project-images__thumbnail"><img src="<?= Url::toRoute(['/public/images/projects/'.$item['image']]);?>" /></a>
        <?php endforeach; ?>
<!--        <a href="/temp/slider-images/2.jpg" class="project-images__thumbnail"><img src="/temp/slider-images/previews/2.jpg" /></a>-->
<!--        <a href="/temp/slider-images/3.jpg" class="project-images__thumbnail"><img src="/temp/slider-images/previews/3.jpg" /></a>-->
<!--        <a href="/temp/slider-images/4.jpg" class="project-images__thumbnail"><img src="/temp/slider-images/previews/4.jpg" /></a>-->
    </div>
</section>