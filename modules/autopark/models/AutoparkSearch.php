<?php

namespace app\modules\autopark\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\autopark\models\Autopark;

/**
 * AutoparkSearch represents the model behind the search form of `app\modules\autopark\models\Autopark`.
 */
class AutoparkSearch extends Autopark
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'length', 'height', 'weight', 'order', 'is_enable'], 'integer'],
            [['name', 'image', 'for', 'description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Autopark::find();

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
            'length' => $this->length,
            'height' => $this->height,
            'weight' => $this->weight,
            'order' => $this->order,
            'is_enable' => $this->is_enable,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'for', $this->for])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
