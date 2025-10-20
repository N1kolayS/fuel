<?php

use app\models\Provider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProviderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Организация спонсор';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="provider-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'tableOptions' => ['class' => 'table table-striped table-hover'],
        //'filterModel' => $searchModel,
        'columns' => [

            'name',
            'balance',
            'comment',
            [
                'class' => ActionColumn::class,
                'template' => '{view}',
                'urlCreator' => function ($action, Provider $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
