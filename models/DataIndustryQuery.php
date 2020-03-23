<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DataIndustry]].
 *
 * @see DataIndustry
 */
class DataIndustryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DataIndustry[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DataIndustry|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
