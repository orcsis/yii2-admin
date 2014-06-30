<?php

use yii\db\Schema;

class m140602_111327_create_menu_table extends \yii\db\Migration
{

    public function safeUp()
    {
        $this->createTable('{{%menu}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . '(128) NOT NULL',
            'parent' => Schema::TYPE_INTEGER. ' NULL',
            'route' => Schema::TYPE_STRING . '(256)',
            'order' => Schema::TYPE_INTEGER,
            'data' => Schema::TYPE_TEXT,
            'FOREIGN KEY (parent) REFERENCES {{%menu}}(id) ON DELETE SET NULL ON UPDATE CASCADE',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%menu}}');
    }
}