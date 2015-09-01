<?php

namespace app\modules\test\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_update
 * @property string $preview
 * @property string $date
 * @property integer $author_id
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date_update', 'preview', 'date', 'author_id'], 'required'],
            [['date_update', 'date'], 'safe'],
            [['author_id'], 'integer'],
            [['name'], 'string', 'max' => 245],
            [['preview'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date_update' => 'Date Update',
            'preview' => 'Preview',
            'date' => 'Date',
            'author_id' => 'Author ID',
        ];
    }

    public function getAuthors()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\test\models\repo\BooksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\test\models\repo\BooksQuery(get_called_class());
    }
}
