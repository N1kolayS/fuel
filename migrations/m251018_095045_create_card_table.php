<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%card}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%provider}}`
 * - `{{%user}}`
 */
class m251018_095045_create_card_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%card}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'number' => $this->string(),
            'pin' => $this->integer(),
            'provider_id' => $this->integer()->notNull(),
            'keeper_id' => $this->integer(),
        ]);

        // creates index for column `provider_id`
        $this->createIndex(
            '{{%idx-card-provider_id}}',
            '{{%card}}',
            'provider_id'
        );

        // add foreign key for table `{{%provider}}`
        $this->addForeignKey(
            '{{%fk-card-provider_id}}',
            '{{%card}}',
            'provider_id',
            '{{%provider}}',
            'id',
            'CASCADE'
        );

        // creates index for column `keeper_id`
        $this->createIndex(
            '{{%idx-card-keeper_id}}',
            '{{%card}}',
            'keeper_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-card-keeper_id}}',
            '{{%card}}',
            'keeper_id',
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
        // drops foreign key for table `{{%provider}}`
        $this->dropForeignKey(
            '{{%fk-card-provider_id}}',
            '{{%card}}'
        );

        // drops index for column `provider_id`
        $this->dropIndex(
            '{{%idx-card-provider_id}}',
            '{{%card}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-card-keeper_id}}',
            '{{%card}}'
        );

        // drops index for column `keeper_id`
        $this->dropIndex(
            '{{%idx-card-keeper_id}}',
            '{{%card}}'
        );

        $this->dropTable('{{%card}}');
    }
}
