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
 * @property-read User $user
 * @property-read Card|null $card
 */
class Trip extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'trip';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['driver_name', 'driver_tg', 'driver_phone', 'origin', 'destination', 'value', 'amount', 'card_id',], 'required'],
            [['created_at', 'trip_at', 'driver_name', 'driver_tg', 'driver_call', 'driver_phone', 'origin', 'destination', 'value', 'amount', 'card_id', 'fuel'], 'default', 'value' => null],
            [['created_at', 'trip_at'], 'safe'],
            [['value'], 'number'],
            [['amount', 'card_id', 'user_id'], 'integer'],
            [['driver_name', 'driver_tg', 'driver_call', 'driver_phone', 'origin', 'destination', 'fuel'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'trip_at' => 'Дата выезда',
            'driver_name' =>  'Фамилия Имя',
            'driver_tg' => 'Telegram',
            'driver_call' => 'Позывной',
            'driver_phone' => 'Телефон',
            'origin' => 'Выезд',
            'destination' => 'Назначение',
            'value' => 'Объем л',
            'amount' => 'Сумма',
            'card_id' => 'Card ID',
            'fuel' => 'Вид топлива',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser(): \yii\db\ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCard(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Card::class, ['id' => 'card_id']);
    }

    /**
     * @return Card[]|array|array[]|\yii\db\ActiveRecord[]
     */
    public static function listCards(): array
    {
        return Card::find()->all();
    }

    /**
     * @param $insert
     * @return bool
     */
    public function beforeSave($insert): bool
    {
        if ($this->isNewRecord)
        {
            $this->created_at = date('Y-m-d H:i:s');
            $this->user_id = Yii::$app->user->id;
        }
        return parent::beforeSave($insert);
    }


}
