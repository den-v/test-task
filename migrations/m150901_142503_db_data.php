<?php

use yii\db\Schema;
use yii\db\Migration;

class m150901_142503_db_data extends Migration
{
    public function init()
    {
        $this->db = \Yii::$app->db;
        parent::init();
    }

    public function up()
    {
        $this->createTable('authors',[
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'firstname' => 'varchar(45) NOT NULL',
            'lastname' => 'varchar(45) NOT NULL',
            'PRIMARY KEY (`id`)'
        ],"ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");

        $this->batchInsert('authors',['id','firstname','lastname'],[
            [1,'Ishmael','Beah'],
            [2,'Stephen','Hawking'],
            [3,'Bob','Woodward'],
            [4,'Edwidge','Danticat'],
            [5,'Christopher','McDougall'],
        ]);

        $this->createTable('books',[
            'id' => 'int(11) NOT NULL AUTO_INCREMENT',
            'name' => 'varchar(245) NOT NULL',
            'date_update' => 'date NOT NULL',
            'preview' => 'varchar(100) NOT NULL',
            'date' => 'date NOT NULL',
            'author_id' => 'int(11) NOT NULL',
            'PRIMARY KEY (`id`)'
        ],"ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8");

        $this->batchInsert('books',['id','name','date_update','preview','date','author_id'],[
            [1,'A Long Way Gone',date('Y-m-d'),'img/book_1.jpg','2008-08-05',1],
            [2,'A Brief History of Time',date('Y-m-d'),'img/book_2.jpg','1998-09-01',2],
            [3,'All the President\'s Men',date('Y-m-d'),'img/book_3.jpg','1994-06-16',3],
            [4,'Breath, Eyes, Memory',date('Y-m-d'),'img/book_4.jpg','1998-05-18',4],
            [5,'Born To Run',date('Y-m-d'),'img/book_5.jpg','2011-03-29',5],
        ]);
    }

    public function down()
    {
        echo "m150901_142503_db_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
