<?php

/** @var yii\web\View $this */

use app\models\Trip;

$this->title = 'Каталог Книг';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Учет топлива ЛА</h1>

        <?= \yii\helpers\Html::a('Записать выезд', ['trip/create'], ['class' => 'btn btn-success btn-lg'])?>

    </div>
    <div>

            В предыдущем месяце <strong><?=Trip::previousMonth()?></strong>
        <br/>
            В этом месяце <strong><?=Trip::currentMonth()?></strong>

    </div>

</div>
