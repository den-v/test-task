<?php

namespace app\modules\test\models\repo;

use yii\helpers\ArrayHelper;
use yii\db\Expression;

/**
 * This is the ActiveQuery class for [[\app\modules\test\models\Authors]].
 *
 * @see \app\modules\test\models\Authors
 */
class AuthorsQuery extends \yii\db\ActiveQuery
{
    public function getAuthorsList()
    {
        $result = $this
            ->distinct(true)
            ->select(['id'=>'id', 'name' => new Expression("CONCAT(firstname,' ',lastname)")])
            ->orderBy('name')
            ->asArray()
            ->all();
        $result = ArrayHelper::map($result,'id','name');

        $final = ['---'];
        $result = ArrayHelper::merge($final,$result);
        return $result;
    }

    /**
     * @inheritdoc
     * @return \app\modules\test\models\Authors[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\test\models\Authors|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}