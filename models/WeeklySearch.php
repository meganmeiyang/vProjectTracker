<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Weekly;

/**
 * WeeklySearch represents the model behind the search form of `app\models\Weekly`.
 */
class WeeklySearch extends Weekly
{
	
	
	public function attributes(){
		return array_merge(parent::attributes(), [
			
			'project.name_customer',
		]);
		
	}
	
	
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
			
            [['id_toProject', 'num_week'], 'integer'],
            [['name_submitter', 'date_submitted', 'action', 'name_at', 'date_check', 'date_modified', 'name_modifiedBy', 'item_week','project.name_customer'
				
				], 'safe'],
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
        $query = Weekly::find();

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
            'id_week' => $this->id_week,
            'date_submitted' => $this->date_submitted,
            'id_toProject' => $this->id_toProject,
            'num_week' => $this->num_week,
            'date_check' => $this->date_check,
            'date_modified' => $this->date_modified,
        ]);

        $query->andFilterWhere(['like', 'name_submitter', $this->name_submitter])
            ->andFilterWhere(['like', 'action', $this->action])
            ->andFilterWhere(['like', 'name_at', $this->name_at])
            ->andFilterWhere(['like', 'name_modifiedBy', $this->name_modifiedBy])
            ->andFilterWhere(['like', 'item_week', $this->item_week]);

        return $dataProvider;
    }
}
