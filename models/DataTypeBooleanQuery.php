<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DataTypeBoolean]].
 *
 * @see DataTypeBoolean
 */
class DataTypeBooleanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DataTypeBoolean[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DataTypeBoolean|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
