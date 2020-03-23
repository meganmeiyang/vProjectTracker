<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "data_selling_model".
 *
 * @property int $iddata_selling_model
 * @property int $value_selling_modelcol
 * @property string $content_selling_modelcol1
 *
 * @property Project[] $projects
 */
class DataSellingModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_selling_model';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value_selling_model', 'content_selling_model'], 'required'],
            [['value_selling_model'], 'integer'],
            [['content_selling_model'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddata_selling_model' => 'Iddata Selling Model',
            'value_selling_model' => 'Selling Model Code',
            'content_selling_model' => 'Sell Model',
        ];
    }

    /**
     * Gets query for [[Projects]].
     *
     * @return \yii\db\ActiveQuery|ProjectQuery
     */
    public function getProjects()
    {
        return $this->hasMany(Project::className(), ['mode_selling' => 'iddata_selling_model']);
    }

    /**
     * {@inheritdoc}
     * @return DataSellingModelQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DataSellingModelQuery(get_called_class());
    }
}
