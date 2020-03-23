<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "project".
 *
 * @property int $id_project
 * @property string|null $created_on
 * @property string|null $created_by user name
 * @property string $name_customer
 * @property string $name_country
 * @property string|null $text_requirements
 * @property string|null $text_solutions
 * @property string|null $name_sales
 * @property string|null $name_FAE
 * @property string|null $name_PM
 * @property int|null $quantity_sim
 * @property int|null $type_sim 1, physical sim 2, softsim 3, chipsim 4, esim 5, 
 * @property int|null $service_data 0, no data 1, data service
 * @property int|null $service_platform
 * @property int|null $service_software
 * @property int|null $cycle_data 1, month 2, year 3, day
 * @property int|null $size_data unit: MB
 * @property int|null $sales_data
 * @property int|null $sales_sim
 * @property int|null $sales_platform
 * @property int|null $sales_software
 * @property int|null $tag_eSIM
 * @property int|null $statusx 1, engaged&demo 10% 2, hw/sw design completed 20% 3, quote/mg’mt accepted 50% 4, poc&sample tested 60% 5, pilot order 80% 6, MP 100%
 * @property int|null $statusy 1, ongoing 2, suspended 3, terminated 4, closed and operated
 * @property string|null $name_operation when project is in operation mode (constant delivery) , name of the operation /team that takes over.
 * @property int|null $mode_selling 1, direct selling 2, distribution
 * @property int|null $industry_customer 1, iot 2, toursim
 * @property int|null $role_customer 1, MNO 2, MVNO 3, OEM original equipment manafacturer 4, OES original equipment supplier 5, ODM original design manufacturer 6, Government 7, Agency 8, others 9, 
 *
 * @property Weekly[] $weeklies
 */
class Project extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_on', 'Role.content_role'], 'safe'],
            [['name_customer', 'name_country'], 'required'],
            [['quantity_sim', 'type_sim', 'service_data', 'service_platform', 'service_software', 'cycle_data', 'size_data', 'sales_data', 'sales_sim', 'sales_platform', 'sales_software', 'tag_eSIM', 'progress', 'statusy', 'mode_selling', 'industry_customer', 'role_customer'], 'integer'],
            [['created_by', 'name_customer', 'name_country', 'name_sales', 'name_FAE', 'name_PM', 'name_operation'], 'string', 'max' => 45],
            [['text_requirements', 'text_solutions'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_project' => 'ID',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'name_customer' => 'Customer',
            'name_country' => 'Country',
            'text_requirements' => 'Requirements',
            'text_solutions' => 'Solutions',
            'name_sales' => 'Sales',
            'name_FAE' => 'FAE',
            'name_PM' => 'PM',
            'quantity_sim' => 'Quantity Sim',
            'type_sim' => 'Type Sim',
            'service_data' => 'Service Data',
            'service_platform' => 'Service Platform',
            'service_software' => 'Service Software',
            'cycle_data' => 'Cycle',
            'size_data' => 'Data Size',
            'sales_data' => 'Sales Data',
            'sales_sim' => 'Sales Sim',
            'sales_platform' => 'Sales Platform',
            'sales_software' => 'Sales Software',
            'tag_eSIM' => 'Tag E Sim',
            'progress' => 'Progress',
            'statusy' => 'Status',
            'name_operation' => 'Operator',
            'mode_selling' => 'Mode Selling',
            'industry_customer' => 'Industry Customer',
            'role_customer' => 'Customer Role',
			'sales_weighed_total' => 'Weighed Sales',
			'name_supplier' => 'Supplier',
        ];
    }

    /**
     * Gets query for [[Weeklies]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getWeeklies()
    {
        return $this->hasMany(Weekly::className(), ['id_toProject' => 'id_project']);
    }

	/**
	* relation for role
	*/
	public function getRole(){
		return $this->hasOne(DataRoleCustomer::className(), ['iddata_role_customer'=>'role_customer']);
		
	}
	public function getProgressx(){
		return $this->hasOne(DataProgress::className(), ['iddata_progress'=>'progress']);
	}
	public function getStatus(){
		return $this->hasOne(DataStatus::className(), ['iddata_status'=>'statusy']);
		
	}
	public function getIndustry(){
		return $this->hasOne(DataIndustry::className(), ['iddata_industry'=>'industry_customer']);
		
	}
	public function getSellmodel(){
		return $this->hasOne(DataSellingModel::className(), ['iddata_selling_model'=>'mode_selling']);
		
	}
	public function getBooleanvalue(){
		return $this->hasOne(DataTypeBoolean::className(), ['iddata_type_boolean'=>'service_data']);
		
	}	
	public function getCycle(){
		return $this->hasOne(DataTypeCycle::className(), ['iddata_type_cycle'=>'cycle_data']);
		
	}
	public function getSimtype(){
		return $this->hasOne(DataTypeSim::className(), ['iddata_type_sim'=>'type_sim']);
		
	}
    /**
     * {@inheritdoc}
     * @return ProjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectQuery(get_called_class());
    }
}
