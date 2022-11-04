<?php

namespace app\modules\tarif\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\tarif\models\Tarif;

/**
 * TarifSearch represents the model behind the search form of `app\modules\tarif\models\Tarif`.
 */
class TarifSearch extends Tarif {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'from_id', 'to_id', 't2_otdelno', 't2_dogruz', 't5_otdelno', 't5_dogruz', 't10_otdelno', 't10_dogruz', 't20_otdelno', 't20_dogruz', 'trall_otdelno', 'trall_dogruz'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Tarif::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'from_id' => $this->from_id,
            'to_id' => $this->to_id,
            't2_otdelno' => $this->t2_otdelno,
            't2_dogruz' => $this->t2_dogruz,
            't5_otdelno' => $this->t5_otdelno,
            't5_dogruz' => $this->t5_dogruz,
            't10_otdelno' => $this->t10_otdelno,
            't10_dogruz' => $this->t10_dogruz,
            't20_otdelno' => $this->t20_otdelno,
            't20_dogruz' => $this->t20_dogruz,
            'trall_otdelno' => $this->trall_otdelno,
            'trall_dogruz' => $this->trall_dogruz,
        ]);


        return $dataProvider;
    }

}
