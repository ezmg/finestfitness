<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HorariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Horarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,

        'columns' => [

            'nombreDia.dia',
            'apertura',
            'cierre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
