<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DetailModel;

/**
 * DetailSearch represents the model behind the search form about `app\models\DetailModel`.
 */
class DetailSearch extends DetailModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'jml', 'hidden'], 'integer'],
            [['tgl', 'jenis', 'data_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DetailModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'tgl' => $this->tgl,
            'jml' => $this->jml,
            'data_time' => $this->data_time,
            'hidden' => $this->hidden,
        ]);

        $query->andFilterWhere(['like', 'jenis', $this->jenis]);

        return $dataProvider;
    }
}
