<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetailModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tgl')->textInput(['class'=>'form-control datepicker']) ?>

    <?= $form->field($model, 'jenis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jml')->textInput() ?>

    <?= $form->field($model, 'data_time')->textInput() ?>

    <?= $form->field($model, 'hidden')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
