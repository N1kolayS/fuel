<?php

/** @var yii\web\View $this */

$this->title = 'Каталог Книг';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Учет топлива ЛА</h1>

        <?= \yii\helpers\Html::a('Записать выезд', ['trip/create'], ['class' => 'btn btn-success btn-lg'])?>

    </div>


</div>
