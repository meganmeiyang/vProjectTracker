<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_type_cycle".
 *
 * @property int $iddata_type_cycle
 * @property int $value_type_cycle
 * @property string $content_type_cycle
 *
 * @property Project[] $projects
 */
class DataTypeCycle extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_type_cycle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value_type_cycle', 'content_type_cycle'], 'required'],
            [['value_type_cycle'], 'integer'],
            [['content_type_cycle'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddata_type_cycle' => 'Iddata Type Cycle',
            'value_type_cycle' => 'Cycle code',
            'content_type_cycle' => 'Cycle',
        ];
    }

    /**
     * Gets query for [[Projects]].
     *
     * @return \yii\db\ActiveQuery|ProjectQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['cycle_data' => 'iddata_type_cycle']);
    }

    /**
     * {@inheritdoc}
     * @return DataTypeCycleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DataTypeCycleQuery(get_called_class());
    }
}
