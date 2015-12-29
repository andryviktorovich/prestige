<?php
$this->title = 'Prestige Bulding Group';
?>

<section class="content article">
    <h1 class="page__title"><?= isset($page['title_menu']) ? $page['title_menu'] : '';?></h1>
    <div class="article__wrapper text">
        <h2 class="article__title"><?= isset($page['title']) ? $page['title'] : '';?></h2>
        <?= isset($page['text']) ? $page['text'] : ''; ?>
    </div>
</section>
