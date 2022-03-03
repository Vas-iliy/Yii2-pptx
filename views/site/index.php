<?php

/** @var yii\web\View $this */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="container">
        <?$form = ActiveForm::begin([
            'method' => 'post',
        ])?>
        <?= $form->field($model, 'file')->fileInput()->label(false) ?>
        <?= Html::submitButton('Отправить') ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
