<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Trip $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'trip_at')->textInput() ?>

    <?= $form->field($model, 'driver_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'driver_tg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'driver_call')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'driver_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'origin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'destination')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'card_id')->textInput() ?>

    <?= $form->field($model, 'fuel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
