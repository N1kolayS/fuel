<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trip".
 *
 * @property int $id
 * @property string|null $created_at
 * @property string|null $trip_at
 * @property string|null $driver_name
 * @property string|null $driver_tg
 * @property string|null $driver_call
 * @property string|null $driver_phone
 * @property string|null $origin
 * @property string|null $destination
 * @property float|null $value
 * @property int|null $amount
 * @property int|null $card_id
 * @property string|null $fuel
 * @property int $user_id
 *
 * @property User $user
 */
class Trip extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'trip_at', 'driver_name', 'driver_tg', 'driver_call', 'driver_phone', 'origin', 'destination', 'value', 'amount', 'card_id', 'fuel'], 'default', 'value' => null],
            [['created_at', 'trip_at'], 'safe'],
            [['value'], 'number'],
            [['amount', 'card_id', 'user_id'], 'integer'],
            [['user_id'], 'required'],
            [['driver_name', 'driver_tg', 'driver_call', 'driver_phone', 'origin', 'destination', 'fuel'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'trip_at' => 'Trip At',
            'driver_name' => 'Driver Name',
            'driver_tg' => 'Driver Tg',
            'driver_call' => 'Driver Call',
            'driver_phone' => 'Driver Phone',
            'origin' => 'Origin',
            'destination' => 'Destination',
            'value' => 'Value',
            'amount' => 'Amount',
            'card_id' => 'Card ID',
            'fuel' => 'Fuel',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}
