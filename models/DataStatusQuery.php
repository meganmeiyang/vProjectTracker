<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DataStatus]].
 *
 * @see DataStatus
 */
class DataStatusQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DataStatus[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DataStatus|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
