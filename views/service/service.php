<?php
$this->title = 'Услуги | Prestige Bulding Group';
?>

<section class="content article">
    <h1 class="page__title"><?= isset($page['title']) ? $page['title'] : '';?></h1>
    <div class="article__wrapper text">
        <?= isset($page['text']) ? $page['text'] : ''; ?>
    </div>
</section>
