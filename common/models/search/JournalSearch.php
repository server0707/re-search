<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Journal;

/**
 * JournalSearch represents the model behind the search form of `common\models\Journal`.
 */
class JournalSearch extends Journal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pages_count', 'created_at', 'updated_at'], 'integer'],
            [['name', 'published', 'file_name', 'description'], 'safe'],
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
        $query = Journal::find();

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
            'pages_count' => $this->pages_count,
//            'published' => $this->published,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'file_name', $this->file_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'published', $this->published]);

        return $dataProvider;
    }
}
