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
            [['id_week'], 'required'],
            [['id_week', 'id_toProject', 'num_week'], 'integer'],
            [['date_submitted', 'date_check', 'date_modified'], 'safe'],
            [['name_submitter', 'action', 'name_at', 'name_modifiedBy'], 'string', 'max' => 45],
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
            'id_toProject' => 'Project ID',
            'num_week' => 'Nth Week',
            'action' => 'Action',
            'name_at' => 'At',
            'date_check' => 'Date to check',
            'date_modified' => 'Modified on',
            'name_modifiedBy' => 'Modified By',
            'item_week' => 'Weekly Updates',
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
			
			$this->name_submitter = $username;
			$this->date_submitted = $time;
		}
		else{
			$this->name_modifiedBy = $username;
			$this->date_modified = $time;    
		}
		
		return true;
    }	
	
}
