<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_type_boolean".
 *
 * @property int $iddata_type_boolean
 * @property int $value_type_boolean
 * @property string $content_type_boolean
 *
 * @property Project[] $projects
 * @property Project[] $projects0
 * @property Project[] $projects1
 * @property Project[] $projects2
 */
class DataTypeBoolean extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_type_boolean';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value_type_boolean', 'content_type_boolean'], 'required'],
            [['value_type_boolean'], 'integer'],
            [['content_type_boolean'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddata_type_boolean' => 'Iddata Type Boolean',
            'value_type_boolean' => 'Boolean Value',
            'content_type_boolean' => 'Boolean',
        ];
    }

    /**
     * Gets query for [[Projects]].
     *
     * @return \yii\db\ActiveQuery|ProjectQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['tag_eSIM' => 'iddata_type_boolean']);
    }

    /**
     * Gets query for [[Projects0]].
     *
     * @return \yii\db\ActiveQuery|ProjectQuery
     */
    public function getProjects0()
    {
        return $this->hasMany(Project::className(), ['service_data' => 'iddata_type_boolean']);
    }

    /**
     * Gets query for [[Projects1]].
     *
     * @return \yii\db\ActiveQuery|ProjectQuery
     */
    public function getProjects1()
    {
        return $this->hasMany(Project::className(), ['service_platform' => 'iddata_type_boolean']);
    }

    /**
     * Gets query for [[Projects2]].
     *
     * @return \yii\db\ActiveQuery|ProjectQuery
     */
    public function getProjects2()
    {
        return $this->hasMany(Project::className(), ['service_software' => 'iddata_type_boolean']);
    }

    /**
     * {@inheritdoc}
     * @return DataTypeBooleanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DataTypeBooleanQuery(get_called_class());
    }
}
