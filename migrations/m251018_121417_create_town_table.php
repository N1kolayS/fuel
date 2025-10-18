<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%town}}`.
 */
class m251018_121417_create_town_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%town}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%town}}');
    }
}
