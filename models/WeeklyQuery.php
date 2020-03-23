<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Weekly]].
 *
 * @see Weekly
 */
class WeeklyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Weekly[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Weekly|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
