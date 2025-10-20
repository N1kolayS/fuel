<?php


use app\models\Trip;
use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\TripSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Выезды';
$this->params['breadcrumbs'][] = $this->title;
$gridColumns = [
    [
        'attribute' => 'trip_at',
        'content' => function(Trip $model) {
            return Yii::$app->formatter->asDate($model->trip_at, "dd LLLL" ) ;
        }
    ],

    'driver_name',

    [
        'attribute' => 'driver_tg',
        'content' => function(Trip $model) {
            return "@".$model->driver_tg;
        }
    ],
    'driver_call',

    [
        'attribute' => 'driver_phone',
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
];
?>
<div class="trip-index">
    <div class="row">

        <div class="col">
            <?= Html::a('Добавить выезд', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
        <div class="col">
            <p class="lead">

                В этом месяце: <strong><?=Trip::currentMonth()?> рублей</strong>
                <br/>
                В предыдущем месяце: <strong><?=Trip::previousMonth()?> рублей</strong>
            </p>

        </div>
        <div class="col">
            <?php
            echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumns,
                'exportConfig' => [
                    ExportMenu::FORMAT_HTML => false,
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_PDF => false,
                    ExportMenu::FORMAT_EXCEL => false,

                ],
            ]);

            ?>
        </div>
    </div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => '', // полностью убираем summary
        'tableOptions' => ['class' => 'table table-striped table-hover'],
        'columns' => [

            //'created_at',
            [
                'attribute' => 'trip_at',
                'content' => function(Trip $model) {
                    return Yii::$app->formatter->asDate($model->trip_at, "dd LLLL" ) ;
                }
            ],
            //'trip_at',

            [
                'attribute' => 'driver_name',
                'content' => function(Trip $model) {

                    $content[] =  Html::tag('p',$model->driver_name);
                    $content[] =  Html::tag('span',$model->driver_call, ['class' => 'text-muted']);
                    return implode("\n", $content);
                }
            ],

            [
                'attribute' => 'driver_tg',
                'content' => function(Trip $model) {

                    return Html::a($model->driver_tg, "https://t.me/".$model->driver_tg, ['target' => '_blank']);
                }
            ],


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
