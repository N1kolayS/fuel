<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Town $model */

$this->title = 'Create Town';
$this->params['breadcrumbs'][] = ['label' => 'Towns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="town-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
