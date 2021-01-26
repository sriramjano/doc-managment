<?php

use yii\db\Schema;
use yii\db\Migration;

class m210126_081546_customer extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%customer}}',
            [
                'id'=> $this->primaryKey(11),
                'uuid'=> $this->string(60)->notNull(),
                'lastname'=> $this->string(120)->notNull(),
                'firstname'=> $this->string(120)->notNull(),
                'mobile'=> $this->integer(10)->notNull(),
                'email'=> $this->string(120)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('uuid','{{%customer}}',['uuid'],true);

    }

    public function safeDown()
    {
        $this->dropIndex('uuid', '{{%customer}}');
        $this->dropTable('{{%customer}}');
    }
}
