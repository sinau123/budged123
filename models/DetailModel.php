<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detail".
 *
 * @property integer $id
 * @property string $tgl
 * @property string $jenis
 * @property integer $jml
 * @property string $data_time
 * @property integer $hidden
 */
class DetailModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $jumlah;
    public $detail_jumlah;
    public static function tableName()
    {
        return 'detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tgl', 'jenis', 'jml'], 'required'],
            [['tgl', 'data_time'], 'safe'],
            [['jml', 'hidden'], 'integer'],
            [['jenis'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tgl' => 'Tanggal',
            'jenis' => 'Item Pengeluaran',
            'jml' => 'Biaya',
            'jumlah' => 'Total Biaya',
            'data_time' => 'Data Time',
            'hidden' => 'Hidden',
        ];
    }

    public static function getDetailShow(){
        $model = DetailModel::find()->select('*,sum(jml) as jumlah')->where('hidden = 1')->groupBy('tgl');
        return $model;
    }

    public static function getDetailTotal($tgl){
        $model = DetailModel::find()->select('sum(jml) as jumlah')->where("hidden = 1 AND tgl = '$tgl'")->one();        
        return $model->jumlah;
    }

    public static function getTotal(){
        $model = DetailModel::find()->select('sum(jml) as jumlah')->where("hidden = 1")->one();        
        return $model->jumlah;
    }
}
