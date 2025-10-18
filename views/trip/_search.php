<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TripSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'trip_at') ?>

    <?= $form->field($model, 'driver_name') ?>

    <?= $form->field($model, 'driver_tg') ?>

    <?php // echo $form->field($model, 'driver_call') ?>

    <?php // echo $form->field($model, 'driver_phone') ?>

    <?php // echo $form->field($model, 'origin') ?>

    <?php // echo $form->field($model, 'destination') ?>

    <?php // echo $form->field($model, 'value') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'card_id') ?>

    <?php // echo $form->field($model, 'fuel') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
