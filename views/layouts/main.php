<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\models\Company;
use yii\helpers\Url;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
<title><?= Html::encode($this->title) ?></title>
<link rel="shortcut icon" href="/public/images/favicon.ico" type="image/png">
<?php require('template/head.inc'); ?>
<body>
<!-- Page -->
<div class="page" id="root">
    <?php include('template/slider-nav-item.inc'); ?>
    <?php include('template/slider-item.inc'); ?>

    <section class="header <?= isset($this->params['header_transparent']) && $this->params['header_transparent']  ? 'header_transparent' : ''; ?>">
          <span class="header__menu-btn">
            <i class="header__menu-btn__line header__menu-btn__line_first"></i>
            <i class="header__menu-btn__line header__menu-btn__line_middle"></i>
            <i class="header__menu-btn__line header__menu-btn__line_last"></i>
          </span>
        <a href="/" class="header__logo"><img src="/build/images/logo.svg" /></a>

        <section class="header__menu">
            <div class="header__menu__background"></div>
            <!-- Header Menu Wrapper-->
            <div class="header__menu__wrapper">
                <div class="header__menu__content">
                    <span class="header__menu__close"></span>
                    <div class="header__menu__item">
                        <p class="header__menu__item__link header__menu__item__link_disabled header__menu__item__link_about">О компании</p>
                        <ul class="header__menu__submenu">
                            <?php
                                $company = new Company();
                                $menuItem = $company->getItemsForMenu();
                                foreach($menuItem as $item):
                                    ?>
                                    <li class="header__menu__submenu__item">
                                        <a href="<?= Url::toRoute(['company/index', 'page' => $item['url']]);?>" class="header__menu__submenu__item__link"><?= $item['title_menu']?></a>
                                    </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="header__menu__item">
                        <a href="<?= Url::toRoute(['/service']);?>" class="header__menu__item__link header__menu__item__link_services">Услуги</a>
                    </div>
                    <div class="header__menu__item">
                        <a href="<?= Url::toRoute(['/project']);?>" class="header__menu__item__link header__menu__item__link_projects">Проекты</a>
                    </div>
                    <div class="header__menu__item">
                        <a href="<?= Url::toRoute(['/news']);?>" class="header__menu__item__link header__menu__item__link_news">Новости</a>
                    </div>
                    <div class="header__menu__item">
                        <a href="<?= Url::toRoute(['/contacts']);?>" class="header__menu__item__link header__menu__item__link_contacts">Контакты</a>
                    </div>
                </div>
            </div>
            <!-- /Header Menu Wrapper-->
        </section>
    </section>





    <?= $content ?>


</div>
<!--/Page -->

<!-- JS -->
<?php include('template/scripts.inc'); ?>
<!--/JS -->

<? if((isset($this->params['footer']) && $this->params['footer']) || !isset($this->params['footer'])) include('template/footer.inc'); ?>

</body>
</html>
<?php $this->endPage() ?>



