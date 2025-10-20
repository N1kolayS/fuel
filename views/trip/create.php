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
    
    DRIVER_FUEL.val(item.default_fuel);
        
        console.log(item);
}
JS;


$this->registerJs($js);
?>
<div class="trip-create">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <div class="trip-form">
        <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>
        <div class="row">
            <div class="col-6">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title text-muted text-center">Данные водителя</h5>

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
                                    'placeholder' => 'Фамилия  Имя',

                                ]
                            ]) ?>



                        <?= $form->field($model, 'driver_tg')->textInput(['maxlength' => true, 'placeholder' => 'Телеграм']) ?>

                        <?= $form->field($model, 'driver_call')->textInput(['maxlength' => true, 'placeholder' => 'Позывной (не обязательно)']) ?>


                        <?= $form->field($model, 'driver_phone')->widget(\yii\widgets\MaskedInput::class, [
                            'mask' => '7(999)999-99-99',
                        ]) ?>

                        <?= $form->field($model, 'origin')->textInput(['maxlength' => true, 'placeholder' => 'Город выезда']) ?>

                        <?= $form->field($model, 'card_id')->dropDownList(
                            ArrayHelper::map($model::listCards(), 'id', 'name'), ['prompt' => '- Укажите карту - ']) ?>


                        <?= $form->field($model, 'fuel')->dropDownList(ArrayHelper::map($model::listFuels(), 'name', 'name')) ?>
                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-muted text-center">Информация о выезде</h5>
                        <?= $form->field($model, 'trip_at')->input('date') ?>

                        <?= $form->field($model, 'destination')->textInput(['maxlength' => true, 'placeholder' => 'Населенный пункт']) ?>

                        <?= $form->field($model, 'value')->textInput(['maxlength' => true, 'placeholder' => 'Количество топлива в литрах']) ?>

                        <?= $form->field($model, 'amount')->textInput(['placeholder' => 'Сумма без копеек']) ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
            </div>
        </div>


        <?php ActiveForm::end(); ?>

    </div>


</div>
