<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_progress".
 *
 * @property int $iddata_progress
 * @property float $value_progress
 * @property string $content_progress
 *
 * @property Project[] $projects
 */
class DataProgress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_progress';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value_progress', 'content_progress'], 'required'],
            [['value_progress'], 'number'],
            [['content_progress'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddata_progress' => 'Iddata Progress',
            'value_progress' => 'Progress %',
            'content_progress' => 'Progress',
        ];
    }

    /**
     * Gets query for [[Projects]].
     *
     * @return \yii\db\ActiveQuery|ProjectQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['progress' => 'iddata_progress']);
    }

    /**
     * {@inheritdoc}
     * @return DataProgressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DataProgressQuery(get_called_class());
    }
}
