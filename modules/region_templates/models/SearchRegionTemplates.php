<?php

namespace app\modules\region_templates\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\region_templates\models\RegionTemplates;

/**
 * SearchRegionTemplates represents the model behind the search form about `app\modules\region_templates\models\RegionTemplates`.
 */
class SearchRegionTemplates extends RegionTemplates {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'city_id'], 'integer'],
            [['name', 'value', 'url', 'domain', 'ad'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = RegionTemplates::find();

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
            'city_id' => $this->city_id,
            'name' => $this->name,
            'url' => $this->url,
            'domain' => $this->domain,
            'ad' => $this->ad,
        ]);

        $query->andFilterWhere(['like', 'value', $this->value]);
//        $query->andFilterWhere(['url', 'value', $this->url]);

        return $dataProvider;
    }

}
