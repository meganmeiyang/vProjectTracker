<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_type_sim".
 *
 * @property int $iddata_type_sim
 * @property int $value_type_sim
 * @property string $content_type_sim
 *
 * @property Project[] $projects
 */
class DataTypeSim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_type_sim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value_type_sim', 'content_type_sim'], 'required'],
            [['value_type_sim'], 'integer'],
            [['content_type_sim'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddata_type_sim' => 'Iddata Type Sim',
            'value_type_sim' => 'SIM Code',
            'content_type_sim' => 'SIM Type',
        ];
    }

    /**
     * Gets query for [[Projects]].
     *
     * @return \yii\db\ActiveQuery|ProjectQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['type_sim' => 'iddata_type_sim']);
    }

    /**
     * {@inheritdoc}
     * @return DataTypeSimQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DataTypeSimQuery(get_called_class());
    }
}
