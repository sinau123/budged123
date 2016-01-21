<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\FunctionModel;
use app\models\DetailModel;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Tambah Data',['class' => 'btn btn-success','data-toggle'=>'modal', 'data-target'=>'#j-modal-detail']) ?>
    </p>
    <?php Pjax::begin(['id'=> 'pjax-detail']); ?>
    <div class="table-small">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'tgl',
                // 'format' => ['date', 'php:d M Y'],
                'value' => function($data){
                                return FunctionModel::tglIndo($data->tgl);
                            },
                'footer'=> 'Total',
                'footerOptions'=>['style'=>'text-align : center'],
            ],    
            // 'jenis',
            [
                'attribute' => 'jumlah',
                'contentOptions' => ['class' => 'right'],
                'format' => ['Decimal',0],
                'footer'=> number_format(DetailModel::getTotal(),0),

            ], 
            // 'data_time',
            // 'hidden',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{detail}',
            'buttons' => [
                    'detail' => function ($url,$model,$key) {
                                    return Html::a('detail', Yii::$app->urlManager->createUrl(['detail/detil',"tgl"=>$model->tgl]),
                                        ['title'=>'lihat detail pengeluaran']);
                    },
                ],
             'contentOptions' => ['class' => 'middle'],   
            ],
        ],
        'showFooter'=>TRUE,
        'footerRowOptions' => ['class'=>'right','style'=>'font-weight:bold'],
    ]); ?>
    </div>
    <?php Pjax::end(); ?>
</div>

<!-- Modal -->
<div class="modal fade" id="j-modal-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Data Pengeluaran</h4>
      </div>
      <form id="j-detail-form" action="<?= Yii::$app->urlManager->createUrl('detail/add') ?>" method="post">
          <div class="modal-body">
            <div class="form-group field-detailmodel-tgl required">
                <label class="control-label" for="detailmodel-tgl">Tanggal</label>
                <input type="text" id="detailmodel-tgl" value="<?= date("Y-m-d") ?>" class="form-control datepicker" name="DetailModel[tgl]">

                <div class="help-block"></div>
            </div>
            <div id="j-tempel-clone">
                <hr>
                <div class="form-group field-detailmodel-jenis required">
                    <label class="control-label" for="detailmodel-jenis">Item Pengeluaran</label>
                    <input type="text" class="form-control detailmodel-jenis" name="DetailModel[jenis][]">

                    <div class="help-block"></div>
                </div>
                <div class="form-group field-detailmodel-jml required">
                    <label class="control-label" for="detailmodel-jml">Biaya</label>
                    <input type="text" class="form-control j-format-biaya" name="format_biaya[]">
                    <input type="hidden" name="DetailModel[jml][]" id="" class="j-biaya-value detailmodel-jml">

                    <div class="help-block"></div>
                </div>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-info j-tambah-input">Tambah Item</button>
            </div>       
          </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary j-submit-form">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="clone" style="display:none">
    <div class="j-form-todelete">
        <hr>
        <div class="form-group field-detailmodel-jenis required" style="position:relative">
            <div class="form-delete j-delete-form" data-toggle="tooltip" data-placement="right" title="hapus">
                <div class="close-sign">&times;</div>
            </div>
            <label class="control-label" for="detailmodel-jenis">Item Pengeluaran</label>
            <input type="text" class="detailmodel-jenis form-control" name="DetailModel[jenis][]">
    
            <div class="help-block"></div>
        </div>
        <div class="form-group field-detailmodel-jml required">
            <label class="control-label" for="detailmodel-jml">Biaya</label>
            <input type="text" class="form-control j-format-biaya" name="format_biaya[]">
            <input type="hidden" name="DetailModel[jml][]" class="j-biaya-value detailmodel-jml">
    
            <div class="help-block"></div>
        </div>
    </div>
</div>