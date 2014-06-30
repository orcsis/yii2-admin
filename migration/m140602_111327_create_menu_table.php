<?php

use yii\db\Schema;

class m140602_111327_create_menu_table extends \yii\db\Migration
{

    public function safeUp()
    {
        $this->createTable('{{%osmenu}}', [
            'men_id' => Schema::TYPE_PK,
            'men_nombre' => Schema::TYPE_STRING . '(128) NOT NULL',
            'men_parent' => Schema::TYPE_INTEGER. ' NULL',
            'men_descri' => Schema::TYPE_STRING . '(256)',
			'men_modulo' => Schema::TYPE_STRING . '(128) NOT NULL',
			'men_url' => Schema::TYPE_STRING . '(128) NOT NULL',
            'men_orden' => Schema::TYPE_INTEGER,
            'men_data' => Schema::TYPE_TEXT,
            'FOREIGN KEY (men_parent) REFERENCES {{%osmenu}}(men_id) ON DELETE SET NULL ON UPDATE CASCADE',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%osmenu}}');
    }
}