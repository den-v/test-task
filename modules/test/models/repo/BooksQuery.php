<?php

namespace app\modules\test\models\repo;
use yii\db\Expression;

/**
 * This is the ActiveQuery class for [[\app\modules\test\models\Books]].
 *
 * @see \app\modules\test\models\Books
 */
class BooksQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return \app\modules\test\models\Books[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \app\modules\test\models\Books|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}