<?php

use yii\db\Schema;
use yii\db\Migration;

class m150713_083040_init extends Migration
{
    const TBL_NAME = '{{%user}}';

    public function safeUp() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TBL_NAME, [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'role' =>  Schema::TYPE_SMALLINT.' NOT NULL DEFAULT 10',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
                ], $tableOptions);
        
        $this->createIndex('username', self::TBL_NAME, ['username'], true);
        $this->createIndex('email', self::TBL_NAME, ['email'], true);//true 是唯一索引
    }

    public function safeDown() {
        $this->dropTable(self::TBL_NAME);
    }
}
