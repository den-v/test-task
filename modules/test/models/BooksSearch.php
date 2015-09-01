<?php

namespace app\modules\test\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\test\models\Books;

/**
 * BooksSearch represents the model behind the search form about `app\modules\test\models\Books`.
 */
class BooksSearch extends Books
{

    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['authors.firstname','authors.lastname','authors.author']);
    }

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'date_update', 'preview', 'date','author_id','authors.firstname','authors.lastname','authors.author'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Books::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['authors.author'] = [
            'asc' => ['authors.firstname' => SORT_ASC,'authors.lastname' => SORT_ASC],
            'desc' => ['authors.firstname' => SORT_DESC,'authors.lastname' => SORT_DESC],
        ];

        $query->joinWith(['authors']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if($this->date != ''){
            $dt1 = substr($this->date,0,10);
            $dt2 = substr($this->date,13,10);
            $query->andWhere('date between STR_TO_DATE(:dt1, \'%m/%d/%Y\') and STR_TO_DATE(:dt2, \'%m/%d/%Y\')',[':dt1' => $dt1,':dt2' => $dt2]);
        }

        if((int)$this->author_id>0)
            $query->andWhere('author_id = :author_id',[':author_id' => $this->author_id]);

        if($this->name != '')
            $query->andWhere("name like :book_name",[':book_name' => '%'.$this->name.'%']);

        return $dataProvider;
    }
}
