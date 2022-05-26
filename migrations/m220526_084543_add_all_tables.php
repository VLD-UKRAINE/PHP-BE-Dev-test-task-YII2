<?php

use yii\db\Migration;

/**
 * Class m220526_084543_add_all_tables
 */
class m220526_084543_add_all_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{user}}', [
            'id' => $this->primaryKey(),
            'firstName' => $this->string(255)->notNull(),
            'lastName' => $this->string(255)->notNull(),
            'authKey' => $this->string(255)->notNull(),
            'password' => $this->string(255)->notNull(),
            'accessToken' => $this->string(255)->notNull()
        ]);

        $this->createTable('{{album}}', [
            'id' => $this->primaryKey(),
            'userId' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull()
        ]);

        $this->createTable('{{photo}}', [
            'id' => $this->primaryKey(),
            'albumId' => $this->integer()->notNull(),
            'title' => $this->string(255)->notNull(),
            'url' => $this->string(255)->notNull()
        ]);

        $this->addForeignKey(
            'fk_user_album',
            '{{album}}',
            'userId',
            '{{user}}',
            'id',
            'NO ACTION',
            'NO ACTION'
        );

        $this->addForeignKey(
            'fk_album_photo',
            '{{photo}}',
            'albumId',
            '{{album}}',
            'id',
            'NO ACTION',
            'NO ACTION'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{photo}}');
        $this->dropTable('{{album}}');
        $this->dropTable('{{user}}');
    }
}
