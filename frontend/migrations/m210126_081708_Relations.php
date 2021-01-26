<?php

use yii\db\Schema;
use yii\db\Migration;

class m210126_081708_Relations extends Migration
{

    public function init()
    {
       $this->db = 'db';
       parent::init();
    }

    public function safeUp()
    {
        $this->addForeignKey('fk_doc_map_doc_id',
            '{{%doc_map}}','doc_id',
            '{{%document}}','uuid',
            'CASCADE','CASCADE'
         );
        $this->addForeignKey('fk_doc_map_cus_id',
            '{{%doc_map}}','cus_id',
            '{{%customer}}','uuid',
            'CASCADE','CASCADE'
         );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_doc_map_doc_id', '{{%doc_map}}');
        $this->dropForeignKey('fk_doc_map_cus_id', '{{%doc_map}}');
    }
}
