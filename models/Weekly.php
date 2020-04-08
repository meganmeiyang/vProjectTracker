<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "weekly".
 *
 * @property int $id_week
 * @property string|null $name_submitter
 * @property string|null $date_submitted
 * @property int|null $id_toProject
 * @property int|null $num_week
 * @property string|null $action
 * @property string|null $name_at
 * @property string|null $date_check
 * @property string|null $date_modified
 * @property string|null $name_modifiedBy
 * @property string|null $item_week
 */
class Weekly extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'weekly';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_toProject', 'num_week'], 'required'],
            [['id_toProject', 'num_week', 'old_progress_percent',  'old_sales_sim','old_sales_data','old_sales_platform','old_sales_software','old_sales_act_sim','old_sales_act_data','old_sales_act_platform','old_sales_act_software'], 'integer'],
			//[['old_progress_percent'],'double'], //0.2 => 20%
            [['date_submitted', 'date_check', 'date_modified'], 'safe'],
            [['name_submitter', 'name_at', 'name_modifiedBy'], 'string', 'max' => 45],
			[['action'], 'string','max' => 150],
            [['item_week'], 'string', 'max' => 300],
            [['id_week'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_week' => 'Id Week',
            'name_submitter' => 'Submitted by',
            'date_submitted' => 'Submitted on',
            'id_toProject' => 'Project',
            'num_week' => 'Nth Week',
            'action' => 'Action',
            'name_at' => 'At',
            'date_check' => 'Date to check',
            'date_modified' => 'Modified on',
            'name_modifiedBy' => 'Modified By',
            'item_week' => 'Weekly Updates',
			'project.name_customer' =>'Customer',
			'old_progress_percent'=>'Last Progress',
			'old_sales_sim'=>'Last Projected SIM Sales',
			'old_sales_data'=>'Last Projected Data Sales',
			'old_sales_platform'=>'Last Projected Platform Sales',
			'old_sales_software'=>'Last Projected Software Sales',
			'old_sales_act_sim'=>'Actual SIM Sales',
			'old_sales_act_data'=>'Actual Data Sales',
			'old_sales_act_platform'=>'Actual Platform Sales',
			'old_sales_act_software'=>'Actual Software Sales',
        ];
    }

    /**
     * {@inheritdoc}
     * @return WeeklyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WeeklyQuery(get_called_class());
    }
	
	public function getProject(){
		
		return $this->hasOne(Project::className(), ['id_project'=>'id_toProject']);
	}
	public function getProgressx(){
		
		return $this->hasOne(DataProgress::className(), ['iddata_progress'=>'old_progress_percent']);
	}	
	
	public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
		}

        // ...custom code here...
		$user = Yii::$app->user;
		$identity = $user->identity;
		$username = $identity->username;
		if($username ==null || $username=="") $username='Admin*';
		$time = date("Y-m-d H:i:s");
		if($insert) 
		{
			//considered both created and modified -> for sorting purposes	
			$this->name_submitter = $username;
			$this->date_submitted = $time;
			$this->name_modifiedBy = $username;
			$this->date_modified = $time; 
		}
		else{
			$this->name_modifiedBy = $username;
			$this->date_modified = $time;    
		}
		$project = $this->project;
		//change project progress;
		if($project->progress!=$this->old_progress_percent){//old_progress_percent becomes new progress
			$new_progress = $this->old_progress_percent;
			$this->old_progress_percent = $project->progress; //set to old_progress
			$project->progress = $new_progress;
			$project->save(); //save new progress to project model
		}
		
		return true;
    }	
	
}
