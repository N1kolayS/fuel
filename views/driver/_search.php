<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\DriverSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="driver-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'tg') ?>

    <?= $form->field($model, 'call') ?>

    <?= $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'car') ?>

    <?php // echo $form->field($model, 'default_fuel') ?>

    <?php // echo $form->field($model, 'default_town') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
