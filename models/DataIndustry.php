<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_industry".
 *
 * @property int $iddata_industry
 * @property int $value_industry
 * @property string $content_industry
 *
 * @property Project[] $projects
 */
class DataIndustry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_industry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value_industry', 'content_industry'], 'required'],
            [['value_industry'], 'integer'],
            [['content_industry'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddata_industry' => 'Iddata Industry',
            'value_industry' => 'Industry Code',
            'content_industry' => 'Industry',
        ];
    }

    /**
     * Gets query for [[Projects]].
     *
     * @return \yii\db\ActiveQuery|ProjectQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['industry_customer' => 'iddata_industry']);
    }

    /**
     * {@inheritdoc}
     * @return DataIndustryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DataIndustryQuery(get_called_class());
    }
}
