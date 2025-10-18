<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%driver}}`.
 */
class m251018_095404_create_driver_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%driver}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'tg' => $this->string(),
            'call' => $this->string(),
            'phone' => $this->string(),
            'car' => $this->string(),
            'default_fuel' => $this->string(),
            'default_town' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%driver}}');
    }
}
