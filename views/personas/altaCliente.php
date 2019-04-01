<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Personas */

$this->title = 'Alta de cliente';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['clientes']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_cliente', [
        'model' => $model,
        'listaTarifas' => $listaTarifas,
        'listaMonitores' => $listaMonitores,
    ]) ?>

</div>
