<?php

namespace app\modules\article\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\article\models\Article;

/**
 * ArticleSearch represents the model behind the search form of `app\modules\article\models\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'url_id'], 'integer'],
            [['created_at', 'header', 'content'], 'safe'],
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
        $query = Article::find();

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
        ]);

        $query->andFilterWhere(['like', 'header', $this->header])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
