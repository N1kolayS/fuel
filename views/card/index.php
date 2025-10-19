<?php

use app\models\Card;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CardSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Карты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать карту', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'name',
            [
                    'attribute' => 'number',
                'content' => function(Card $model) {
                    return $model->numberView;
                }
            ],

            'pin',

            [

                'attribute' => 'provider_id',
                'content' => function(Card $model) {
                    return $model->provider->name;
                }
            ],
            [

                'attribute' => 'keeper_id',
                'content' => function(Card $model) {
                    return $model->keeper->username;
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Card $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
