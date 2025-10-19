<?php

use app\models\Driver;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\DriverSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Водители';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driver-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать водителя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'name',
            [
                'attribute' => 'tg',
                'content' => function(Driver $model) {
                    return Html::a($model->tg, "https://t.me/".$model->tg, ['target' => '_blank']);
                }
            ],

            'call',
            'phone',
            'car',
            'default_fuel',
            'default_town',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Driver $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
