<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tgl') ?>

    <?= $form->field($model, 'jenis') ?>

    <?= $form->field($model, 'jml') ?>

    <?= $form->field($model, 'data_time') ?>

    <?php // echo $form->field($model, 'hidden') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
