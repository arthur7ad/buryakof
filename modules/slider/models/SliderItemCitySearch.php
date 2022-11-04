<?php

namespace app\modules\slider\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SliderItemCity;

/**
 * UrlSearch represents the model behind the search form of `app\modules\url\models\Url`.
 */
class SliderItemCitySearch extends SliderItemCity {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['slider_item_id'], 'integer'],
            [['city'], 'safe'],
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
        $query = SliderItemCity::find();

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
            'slider_item_id' => $params['id'],
        ]);

        return $dataProvider;
    }

}
