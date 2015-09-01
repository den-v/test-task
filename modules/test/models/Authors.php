<?php

namespace app\modules\test\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 */
class Authors extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], 'required'],
            [['firstname', 'lastname'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'author' => 'Author'
        ];
    }

    public function getAuthor()
    {
        return $this->firstname.' '.$this->lastname;
    }

    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['author_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\modules\test\models\repo\AuthorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\modules\test\models\repo\AuthorsQuery(get_called_class());
    }
}
