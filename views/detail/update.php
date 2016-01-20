<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DetailModel */

$this->title = 'Update Detail Model: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Detail Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detail-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
