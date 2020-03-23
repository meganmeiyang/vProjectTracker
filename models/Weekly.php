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
 * @property string $num_week
 * @property string|null $action
 * @property string|null $name_at
 * @property string|null $date_check
 * @property string|null $date_modified
 *
 * @property Project $toProject
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
            [['id_week', 'num_week'], 'required'],
            [['id_week', 'id_toProject'], 'integer'],
            [['date_submitted', 'date_check', 'date_modified'], 'safe'],
            [['name_submitter', 'num_week', 'action', 'name_at'], 'string', 'max' => 45],
            [['id_week'], 'unique'],
            [['id_toProject'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['id_toProject' => 'id_project']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_week' => 'Id Week',
            'name_submitter' => 'Name Submitter',
            'date_submitted' => 'Date Submitted',
            'id_toProject' => 'Id To Project',
            'num_week' => 'Num Week',
            'action' => 'Action',
            'name_at' => 'Name At',
            'date_check' => 'Date Check',
            'date_modified' => 'Date Modified',
        ];
    }

    /**
     * Gets query for [[ToProject]].
     *
     * @return \yii\db\ActiveQuery|ProjectQuery
     */
    public function getToProject()
    {
        return $this->hasOne(Project::className(), ['id_project' => 'id_toProject']);
    }

    /**
     * {@inheritdoc}
     * @return WeeklyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new WeeklyQuery(get_called_class());
    }
}
