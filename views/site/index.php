<?php

/** @var yii\web\View $this */

use app\models\Trip;

$this->title = 'Каталог Книг';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Учет топлива ЛА</h1>

        <?= \yii\helpers\Html::a('Добавить выезд', ['trip/create'], ['class' => 'btn btn-success btn-lg'])?>
        <br/>
        <br/>
        <p class="lead">

            В этом месяце: <strong><?=Trip::currentMonth()?> рублей</strong>
            <br/>
            В предыдущем месяце: <strong><?=Trip::previousMonth()?> рублей</strong>
        </p>
    </div>
    <div>



    </div>

</div>
