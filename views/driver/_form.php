<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Driver $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="driver-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'call')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'car')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'default_fuel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'default_town')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
