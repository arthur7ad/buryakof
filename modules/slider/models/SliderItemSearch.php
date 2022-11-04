<?php

namespace app\modules\slider\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\slider\models\SliderItem;

/**
 * UrlSearch represents the model behind the search form of `app\modules\url\models\Url`.
 */
class SliderItemSearch extends SliderItem {

    public $page;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['title', 'page'], 'safe'],
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
        $query = SliderItem::find()->joinWith('slidePages');

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
            'is_enable' => $this->is_enable,
        ]);

        if ($this->page)
            $query->andFilterWhere([
                'slide_page.page_id' => $this->page,
            ]);

        $query->andFilterWhere(['like', 'title', $this->title])
//                ->andFilterWhere(['like', 'url', $this->url])
        ;

        return $dataProvider;
    }

}
