<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[DataRoleCustomer]].
 *
 * @see DataRoleCustomer
 */
class DataRoleCustomerQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return DataRoleCustomer[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return DataRoleCustomer|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
