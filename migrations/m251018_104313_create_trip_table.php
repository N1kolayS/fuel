<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%trip}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m251018_104313_create_trip_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trip}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->datetime(),
            'trip_at' => $this->date(),
            'driver_name' => $this->string(),
            'driver_tg' => $this->string(),
            'driver_call' => $this->string(),
            'driver_phone' => $this->string(),
            'origin' => $this->string(),
            'destination' => $this->string(),
            'value' => $this->decimal(10,2),
            'amount' => $this->integer(),
            'card_id' => $this->integer(),
            'fuel' => $this->string(),
            'user_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-trip-user_id}}',
            '{{%trip}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-trip-user_id}}',
            '{{%trip}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-trip-user_id}}',
            '{{%trip}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-trip-user_id}}',
            '{{%trip}}'
        );

        $this->dropTable('{{%trip}}');
    }
}
