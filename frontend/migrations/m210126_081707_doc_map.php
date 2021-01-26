<?php

use yii\db\Schema;
use yii\db\Migration;

class m210126_081707_doc_map extends Migration
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
            '{{%doc_map}}',
            [
                'id'=> $this->primaryKey(11),
                'cus_id'=> $this->string(60)->notNull(),
                'doc_id'=> $this->string(60)->notNull(),
            ],$tableOptions
        );
        $this->createIndex('doc_id','{{%doc_map}}',['doc_id'],false);
        $this->createIndex('cus_id','{{%doc_map}}',['cus_id'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('doc_id', '{{%doc_map}}');
        $this->dropIndex('cus_id', '{{%doc_map}}');
        $this->dropTable('{{%doc_map}}');
    }
}
