<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%provider}}`.
 */
class m251018_094548_create_provider_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%provider}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'balance' => $this->integer()->defaultValue(0),
            'comment' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%provider}}');
    }
}
