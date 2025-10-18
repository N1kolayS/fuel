<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "card".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $number
 * @property int|null $pin
 * @property int $provider_id
 * @property int|null $keeper_id
 *
 * @property User $keeper
 * @property Provider $provider
 */
class Card extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'number', 'pin', 'keeper_id'], 'default', 'value' => null],
            [['pin', 'provider_id', 'keeper_id'], 'integer'],
            [['provider_id'], 'required'],
            [['number'], 'string', 'max' => 19],
            [['number'], 'match', 'pattern' => '/^[0-9\s]+$/', 'message' => 'Номер карты должен содержать только цифры и пробелы'],
            [['number'], 'filter', 'filter' => function($value) {
                return preg_replace('/\s+/', '', $value);
            }],
            [['name', 'number'], 'string', 'max' => 255],
            [['keeper_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['keeper_id' => 'id']],
            [['provider_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provider::class, 'targetAttribute' => ['provider_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'number' => 'Number',
            'pin' => 'Pin',
            'provider_id' => 'Provider ID',
            'keeper_id' => 'Keeper ID',
        ];
    }

    /**
     * Gets query for [[Keeper]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKeeper()
    {
        return $this->hasOne(User::class, ['id' => 'keeper_id']);
    }

    /**
     * Gets query for [[Provider]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvider()
    {
        return $this->hasOne(Provider::class, ['id' => 'provider_id']);
    }

    /**
     * @return Provider[]|\yii\db\ActiveRecord[]
     */
    public static function listProviders(): array
    {
        return Provider::find()->all();
    }

    public static function listKeepers(): array
    {
        return User::find()->all();
    }

}
