<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_role_customer".
 *
 * @property int $iddata_role_customer
 * @property int $value_role
 * @property string $content_role
 *
 * @property Project[] $projects
 */
class DataRoleCustomer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_role_customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value_role', 'content_role'], 'required'],
            [['value_role'], 'integer'],
            [['content_role'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddata_role_customer' => 'Iddata Role Customer',
            'value_role' => 'Role Code',
            'content_role' => 'Role',
        ];
    }

    /**
     * Gets query for [[Projects]].
     *
     * @return \yii\db\ActiveQuery|ProjectQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['role_customer' => 'iddata_role_customer']);
    }

    /**
     * {@inheritdoc}
     * @return DataRoleCustomerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DataRoleCustomerQuery(get_called_class());
    }
}
