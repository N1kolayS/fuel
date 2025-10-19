<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Driver $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="driver-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tg', [
        'template' => '{label}<div class="form-group input-group required"><span class="input-group-text" id="basic-addon1">@</span>{input}</div><p>{error}</p>',
    ])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'call')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::class, [
        'mask' => '7(999)999-99-99',
    ]) ?>

    <?= $form->field($model, 'car')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'default_fuel')->dropDownList(ArrayHelper::map($model::listFuels(), 'name', 'name')) ?>

    <?= $form->field($model, 'default_town')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
