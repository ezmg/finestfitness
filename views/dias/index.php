<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Dias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-bordered'],
        'headerRowOptions' => ['class' => 'text-primary'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'dia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
