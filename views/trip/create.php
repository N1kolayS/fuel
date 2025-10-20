<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

/** @var yii\web\View $this */
/** @var app\models\Trip $model */

$this->title = 'Добавить выезд';
$this->params['breadcrumbs'][] = ['label' => 'Выезды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$js = <<<JS

const DRIVER_TG = $("#trip-driver_tg")
const DRIVER_PHONE = $("#trip-driver_phone")
const DRIVER_CALL = $("#trip-driver_call")
const DRIVER_ORIGIN = $("#trip-origin")
const DRIVER_CARD = $("#trip-driver_card_id")
const DRIVER_FUEL = $("#trip-fuel")



function setClient(item) {
    DRIVER_TG.val(item.tg);
    DRIVER_PHONE.val(item.phone);
    DRIVER_CALL.val(item.call);
    DRIVER_ORIGIN.val(item.default_town);
    
    DRIVER_FUEL.val(item.driver_fuel);
        
        console.log(item);
}
JS;


$this->registerJs($js);
?>
<div class="trip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="trip-form">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-6">
                <?= $form->field($model, 'driver_name')
                    ->widget(AutoComplete::class, [
                        'clientOptions' => [
                            'source' => Url::to(['ajax-get-driver']),
                            'minLength' => 2,
                            'select' =>new JsExpression('function(event, ui) {
               
                                this.value = ui.item.name;
                                setClient(ui.item)
                                return false;
                            }')
                        ],

                        'options' => [
                            'tabindex' => 1,
                            'autofocus'=>'autofocus',
                            'class' => 'form-control',
                            'placeholder' => 'Фамилия или Имя',

                        ]
                    ]) ?>


                <?= $form->field($model, 'driver_tg')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'driver_call')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'driver_phone')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'origin')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'card_id')->dropDownList(
                        ArrayHelper::map($model::listCards(), 'id', 'name'), ['prompt' => '- Укажите карту - ']) ?>


                <?= $form->field($model, 'fuel')->dropDownList(ArrayHelper::map($model::listFuels(), 'name', 'name')) ?>
            </div>
            <div class="col-6" >
                <?= $form->field($model, 'trip_at')->input('date') ?>

                <?= $form->field($model, 'destination')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'amount')->textInput() ?>

            </div>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>
