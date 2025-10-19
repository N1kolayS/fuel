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

    <p>
        <?= Html::a('Добавить выезд', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'created_at',
            'trip_at',
            'driver_name',
            'driver_tg',
            'driver_call',
            'driver_phone',
            'origin',
            'destination',
            'value',
            'amount',
            'card_id',
            'fuel',
            //'user_id',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Trip $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
