<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RutinasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rutinas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rutinas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Rutinas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'ejercicios',
            'autor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>