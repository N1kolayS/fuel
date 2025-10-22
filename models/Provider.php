<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provider".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $balance
 * @property string|null $comment
 *
 * @property Card[] $cards
 */
class Provider extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'provider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name', 'balance', 'comment'], 'default', 'value' => null],
            [['balance'], 'integer'],
            ['name', 'required'],
            [['balance'], 'default', 'value' => 0],
            [['name', 'comment'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'balance' => 'Balance',
            'comment' => 'Комментарии',
        ];
    }

    /**
     * Gets query for [[Cards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCards(): \yii\db\ActiveQuery
    {
        return $this->hasMany(Card::class, ['provider_id' => 'id']);
    }

}
