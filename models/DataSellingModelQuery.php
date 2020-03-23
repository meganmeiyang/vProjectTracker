<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DataSellingModel]].
 *
 * @see DataSellingModel
 */
class DataSellingModelQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DataSellingModel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DataSellingModel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
