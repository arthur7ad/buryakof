<?php

namespace app\modules\tarif\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\tarif\models\TarifItem;

/**
 * TarifSearch represents the model behind the search form of `app\modules\tarif\models\Tarif`.
 */
class TarifItemSearch extends TarifItem {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'tarif_id'], 'integer'],
            [['name', 'text1', 'text2', 'text3', 'name', 'price', 'image'], 'safe'],
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
        $query = TarifItem::find();

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
            'tarif_id' => $this->tarif_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
                ->andFilterWhere(['text1', 'name', $this->name])
                ->andFilterWhere(['text2', 'name', $this->name])
                ->andFilterWhere(['text3', 'name', $this->name])
                ->andFilterWhere(['price', 'name', $this->name])
        ;

        return $dataProvider;
    }

}
