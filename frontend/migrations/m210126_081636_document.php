<?php

use yii\db\Schema;
use yii\db\Migration;

class m210126_081636_document extends Migration
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
            '{{%document}}',
            [
                'id'=> $this->primaryKey(11),
                'uuid'=> $this->string(60)->notNull(),
                'doc_type'=> $this->string(30)->notNull(),
                'description'=> $this->string(255)->notNull(),
                'document'=> $this->binary()->notNull(),
            ],$tableOptions
        );
        $this->createIndex('uuid','{{%document}}',['uuid'],true);

    }

    public function safeDown()
    {
        $this->dropIndex('uuid', '{{%document}}');
        $this->dropTable('{{%document}}');
    }
}
