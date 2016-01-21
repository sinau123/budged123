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
             'contentOptions' => ['class'=>'middle']],
        ],
        'showFooter'=>TRUE,
        'footerRowOptions' => ['class'=>'right','style'=>'font-weight:bold'],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>

</div>
