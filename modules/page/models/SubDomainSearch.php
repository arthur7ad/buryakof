<?php

namespace app\modules\page\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\page\models\Page;

/**
 * PageSearch represents the model behind the search form of `app\modules\page\models\Page`.
 */
class SubDomainSearch extends Page {

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'url_id', 'parent_id'], 'integer'],
            [['header', 'content', 'created_at', 'template'], 'safe'],
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
        $query = Page::find()->where([
            'not', ['subdomain' => ['', NULL]]
        ]);

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
            'created_at' => $this->created_at,
            'url_id' => $this->url_id,
            'parent_id' => $this->parent_id,
            'template' => $this->template,
        ]);

        $query->andFilterWhere(['like', 'header', $this->header])
                ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }

}
