<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Project;
use Yii;
use yii\helpers\VarDumper;

/**
 * ProjectSearch represents the model behind the search form of `app\models\Project`.
 */
class ProjectSearch extends Project
{
	
	public function attributes(){
		return array_merge(parent::attributes(), ['role.content_role', 
			'progressx.content_progress',
			'status.content_data_status',
			'industry.content_industry',
			'sellmodel.content_selling_model',
			'boolean_data.content_type_boolean',
			'boolean_platform.content_type_boolean',
			'boolean_software.content_type_boolean',
			'cycle.content_type_cycle',
			'simtype.content_type_sim',
			'weeks.item_week',	
		]);
		
	}
	
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_project', 'role_customer', 'industry_customer', 'quantity_sim', 'type_sim', 'service_data', 'service_platform', 'service_software', 'cycle_data', 'size_data', 'sales_exp_data', 'sales_act_data', 'sales_exp_sim', 'sales_act_sim', 'sales_exp_platform', 'sales_act_platform', 'sales_exp_software', 'sales_act_software', 'sales_exp_total', 'sales_act_total', 'sales_weighed_total', 'tag_eSIM', 'progress', 'statusy', 'mode_selling'], 'integer'],
            [['created_on', 'role.content_role', 'exp_mp_date',
				/*new relation*/
				'progressx.content_progress',
				'status.content_data_status',
				'industry.content_industry',
				'sellmodel.content_selling_model',
				'booleanvalue.content_type_boolean',
				'cycle.content_type_cycle',
				'simtype.content_type_sim',
					'created_by', 'name_customer', 'name_country', 'text_requirements', 'text_solutions', 'name_sales', 'name_FAE', 'name_PM', 'name_operation', 'name_supplier', 'coverage','weeks.item_week','application'], 'safe'],
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
        $query = Project::find();

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

		//join with relation to other tables
		$query->joinWith('role AS role');
		$dataProvider->sort->attributes['role.content_role']=[
			'asc' => ['role.content_role' => SORT_ASC],
			'desc' => ['role.content_role' => SORT_DESC],
		];
		$query->joinWith('progressx AS progressx');
		$dataProvider->sort->attributes['progressx.content_progress']=[
			'asc' => ['progressx.content_progress' => SORT_ASC],
			'desc' => ['progressx.content_progress' => SORT_DESC],
		];
		$query->joinWith('status AS status');
		$dataProvider->sort->attributes['status.content_data_status']=[
			'asc' => ['status.content_data_status' => SORT_ASC],
			'desc' => ['status.content_data_status' => SORT_DESC],
		];
		//Yii::debug("progress="+$this->progressx.content_progress);
		
		$query->joinWith('industry AS industry');
		$dataProvider->sort->attributes['industry.content_industry']=[
			'asc' => ['industry.content_industry' => SORT_ASC],
			'desc' => ['industry.content_industry' => SORT_DESC],
		];
		$query->joinWith('sellmodel AS sellmodel');
		$dataProvider->sort->attributes['sellmodel.content_selling_model']=[
			'asc' => ['sellmodel.content_selling_model' => SORT_ASC],
			'desc' => ['sellmodel.content_selling_model' => SORT_DESC],
		];
		$query->joinWith('boolean_data AS boolean_data');
		$dataProvider->sort->attributes['boolean_data.content_type_boolean']=[
			'asc' => ['boolean_data.content_type_boolean' => SORT_ASC],
			'desc' => ['boolea_data.content_type_boolean' => SORT_DESC],
		];
		$query->joinWith('boolean_software AS boolean_software');
		$dataProvider->sort->attributes['boolean_software.content_type_boolean']=[
			'asc' => ['boolean_software.content_type_boolean' => SORT_ASC],
			'desc' => ['boolea_software.content_type_boolean' => SORT_DESC],
		];
		$query->joinWith('boolean_platform AS boolean_platform');
		$dataProvider->sort->attributes['boolean_platform.content_type_boolean']=[
			'asc' => ['boolean_platform.content_type_boolean' => SORT_ASC],
			'desc' => ['boolea_platform.content_type_boolean' => SORT_DESC],
		];
		$query->joinWith('cycle AS cycle');
		$dataProvider->sort->attributes['cycle.content_type_cycle']=[
			'asc' => ['cycle.content_type_cycle' => SORT_ASC],
			'desc' => ['cycle.content_type_cycle' => SORT_DESC],
		];		
		$query->joinWith('simtype AS simtype');
		$dataProvider->sort->attributes['simtype.content_type_sim']=[
			'asc' => ['simtype.content_type_sim' => SORT_ASC],
			'desc' => ['simtype.content_type_sim' => SORT_DESC],
		];			
		$query->joinWith('weeks AS weeks');
		$dataProvider->sort->attributes['weeks.item_week']=[
			'asc' => ['weeks.item_week' => SORT_ASC],
			'desc' => ['weeks.item_week' => SORT_DESC],
		];
		//Yii::info($query->get(), __METHOD__);
		//Yii::info($this->getAttribute('progressx.content_progress'), __METHOD__);
		
        // grid filtering conditions
        $query->andFilterWhere([
            'id_project' => $this->id_project,
            'created_on' => $this->created_on,
			'exp_mp_date' => $this->exp_mp_date,
            'role_customer' => $this->role_customer,
            'industry_customer' => $this->industry_customer,
            'quantity_sim' => $this->quantity_sim,
            'type_sim' => $this->type_sim,
            'service_data' => $this->service_data,
            'service_platform' => $this->service_platform,
            'service_software' => $this->service_software,
            'cycle_data' => $this->cycle_data,
            'size_data' => $this->size_data,
            'sales_exp_data' => $this->sales_exp_data,
            'sales_act_data' => $this->sales_act_data,
            'sales_exp_sim' => $this->sales_exp_sim,
            'sales_act_sim' => $this->sales_act_sim,
            'sales_exp_platform' => $this->sales_exp_platform,
            'sales_act_platform' => $this->sales_act_platform,
            'sales_exp_software' => $this->sales_exp_software,
            'sales_act_software' => $this->sales_act_software,
            'sales_exp_total' => $this->sales_exp_total,
            'sales_act_total' => $this->sales_act_total,
            'sales_weighed_total' => $this->sales_weighed_total,
            'tag_eSIM' => $this->tag_eSIM,
            //'progress' => $this->progress,
            'statusy' => $this->statusy,
            'mode_selling' => $this->mode_selling,
        ]);

        $query->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'name_customer', $this->name_customer])
            ->andFilterWhere(['like', 'name_country', $this->name_country])
            ->andFilterWhere(['like', 'text_requirements', $this->text_requirements])
            ->andFilterWhere(['like', 'text_solutions', $this->text_solutions])
            ->andFilterWhere(['like', 'name_sales', $this->name_sales])
            ->andFilterWhere(['like', 'name_FAE', $this->name_FAE])
            ->andFilterWhere(['like', 'name_PM', $this->name_PM])
            ->andFilterWhere(['like', 'name_operation', $this->name_operation])
            ->andFilterWhere(['like', 'name_supplier', $this->name_supplier])
            ->andFilterWhere(['like', 'coverage', $this->coverage])
			->andFilterWhere(['like', 'application', $this->application])
			->andFilterWhere(['like', 'role.content_role', $this->getAttribute('role.content_role')])
			->andFilterWhere(['like', 'progressx.content_progress', $this->getAttribute('progressx.content_progress')])
			->andFilterWhere(['like', 'status.content_data_status', $this->getAttribute('status.content_data_status')])
			->andFilterWhere(['like', 'industry.content_industry', $this->getAttribute('industry.content_industry')])	
			->andFilterWhere(['like', 'sellmodel.content_selling_model', $this->getAttribute('sellmodel.content_selling_model')])
			->andFilterWhere(['like', 'boolean_data.content_type_boolean', $this->getAttribute('boolean_data.content_type_boolean')])
			->andFilterWhere(['like', 'boolean_platform.content_type_boolean', $this->getAttribute('boolean_platform.content_type_boolean')])
			->andFilterWhere(['like', 'boolean_software.content_type_boolean', $this->getAttribute('boolean_software.content_type_boolean')])
			->andFilterWhere(['like', 'cycle.content_type_cycle', $this->getAttribute('cycle.content_type_cycle')])
			->andFilterWhere(['like', 'simtype.content_type_sim', $this->getAttribute('simtype.content_type_sim')])	
			->andFilterWhere(['like', 'weeks.item_week', $this->getAttribute('weeks.item_week')])		
				;

        return $dataProvider;
    }
}
