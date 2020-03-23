<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DataTypeSim]].
 *
 * @see DataTypeSim
 */
class DataTypeSimQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DataTypeSim[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DataTypeSim|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
