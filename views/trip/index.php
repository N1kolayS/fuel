<?php

use app\models\Trip;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TripSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Выезды';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-index">
    <div>

        <div class="float-start">
            <?= Html::a('Добавить выезд', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="float-end">
            В предыдущем месяце <strong><?=Trip::previousMonth()?></strong>
            <br/>
            В этом месяце <strong><?=Trip::currentMonth()?></strong>
        </div>
    </div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            //'created_at',
            [
                'attribute' => 'trip_at',
                'content' => function(Trip $model) {
                    return Yii::$app->formatter->asDate($model->trip_at, "dd LLLL" ) ;
                }
            ],
            //'trip_at',
            'driver_name',

            [
                'attribute' => 'driver_tg',
                'content' => function(Trip $model) {
                    return Html::a($model->driver_tg, "https://t.me/".$model->driver_tg, ['target' => '_blank']);
                }
            ],
            'driver_call',

            [
                'attribute' => 'driver_phone',
                'headerOptions' => ['width' => '140'],
                'content' => function(Trip $model) {
                    return Yii::$app->formatter->format($model->driver_phone, 'phone');
                }
            ],
            'origin',
            'destination',
            'value',
            'amount',
            [
                'attribute' => 'card_id',
                'content' => function(Trip $model) {
                    return $model->card ? $model->card->name : ' ' ;
                }
            ],

            'fuel',
            //'user_id',
            [
                'class' => ActionColumn::class,
                'template' => '{view}',
                'urlCreator' => function ($action, Trip $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
