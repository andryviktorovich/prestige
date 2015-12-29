<?php
use yii\widgets\ActiveForm;
?>
    <section class="content article">
    <div class="article__wrapper text">
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'imageFile')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>
    </div>
    </section>
