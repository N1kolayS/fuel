<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Trip;

/**
 * TripSearch represents the model behind the search form of `app\models\Trip`.
 */
class TripSearch extends Trip
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['id', 'amount', 'card_id', 'user_id'], 'integer'],
            [['created_at', 'trip_at', 'driver_name', 'driver_tg', 'driver_call', 'driver_phone', 'origin', 'destination', 'fuel'], 'safe'],
            [['value'], 'number'],
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null): ActiveDataProvider
    {
        $query = Trip::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'trip_at' => SORT_DESC,
                ]
            ],
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'created_at' => $this->created_at,
            'trip_at' => $this->trip_at,
            'value' => $this->value,
            'amount' => $this->amount,
            'card_id' => $this->card_id,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'driver_name', $this->driver_name])
            ->andFilterWhere(['like', 'driver_tg', $this->driver_tg])
            ->andFilterWhere(['like', 'driver_call', $this->driver_call])
            ->andFilterWhere(['like', 'driver_phone', $this->driver_phone])
            ->andFilterWhere(['like', 'origin', $this->origin])
            ->andFilterWhere(['like', 'destination', $this->destination])
            ->andFilterWhere(['like', 'fuel', $this->fuel]);

        return $dataProvider;
    }
}
