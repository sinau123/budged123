<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\FunctionModel;
use app\models\DetailModel;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

// var_dump(DetailModel::getDetailJumlah($data['tgl']));return;

$this->title = "Detail Pengeluaran";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-model-index">

    <h1><?= Html::encode($this->title,false) ?></h1>
    <p><?= FunctionModel::tglIndo($data['tgl']) ?></p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detail Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div id="j-delete-alert" class="alert alert-success alert-dismissible" role="alert" style="display:none">
        <button type="button" class="close" aria-label="Close"><span id="j-close-alert" aria-hidden="true">&times;</span></button>
        <strong>Info!</strong> Data berhasil dihapus.
    </div>
    <?php Pjax::begin(['id'=> 'pjax-detail']); ?>
    <div class="table-medium">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],  
            [   'attribute' =>'jenis',
                'footer'=> 'Total',
                'footerOptions'=>['style'=>'text-align : center'],
            ],
            [
                'attribute' => 'jml',
                'contentOptions' => ['class' => 'right'],
                'footer'=> number_format(DetailModel::getDetailTotal($data['tgl']),0),
                'format' => ['Decimal',0],

            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{hapus}',
                'buttons' => [
                    'hapus' => function ($url,$model,$key) {
                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', Yii::$app->urlManager->createUrl('detail/delete'),
                                        ['title'=>'hapus','class'=>'j-delete','data-id'=>$model->id]);
                    },
                ],
             'contentOptions' => ['class'=>'middle']],
        ],
        'showFooter'=>TRUE,
        'footerRowOptions' => ['class'=>'right','style'=>'font-weight:bold'],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>

</div>
