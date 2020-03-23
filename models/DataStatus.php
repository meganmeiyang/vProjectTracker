<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_status".
 *
 * @property int $iddata_status
 * @property int $value_data_status
 * @property string $content_data_status
 *
 * @property Project[] $projects
 */
class DataStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value_data_status', 'content_data_status'], 'required'],
            [['value_data_status'], 'integer'],
            [['content_data_status'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddata_status' => 'Iddata Status',
            'value_data_status' => 'Status Value',
            'content_data_status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Projects]].
     *
     * @return \yii\db\ActiveQuery|ProjectQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['statusy' => 'iddata_status']);
    }

    /**
     * {@inheritdoc}
     * @return DataStatusQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DataStatusQuery(get_called_class());
    }
}
