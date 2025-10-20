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
            'trip_at',
            'driver_name',
            'driver_tg',
            'driver_call',
            'driver_phone',
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
