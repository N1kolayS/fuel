<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Card $model */
/** @var yii\widgets\ActiveForm $form */


?>

<div class="card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->widget(\yii\widgets\MaskedInput::class, [
        'mask' => '9999 9999 9999 9999',
    ]) ?>

    <?= $form->field($model, 'pin')->textInput() ?>

    <?= $form->field($model, 'provider_id')
        ->dropDownList(ArrayHelper::map($model::listProviders(), 'id', 'name'),
        ['prompt' => 'Выберите организацию']) ?>

    <?= $form->field($model, 'keeper_id')
        ->dropDownList(ArrayHelper::map($model::listKeepers(), 'id', 'username'),
            ['prompt' => 'Выберите хранителя']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
