<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DetailModel */

$this->title = 'Create Detail Model';
$this->params['breadcrumbs'][] = ['label' => 'Detail Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
