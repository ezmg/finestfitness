<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Monitores */

$this->title = 'Modificar monitor: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Monitores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="monitores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_modificar', [
        'model' => $model,
        'listaEsp' => $listaEsp,
    ]) ?>

</div>
