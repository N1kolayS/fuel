<?php

namespace app\models;

use app\models\handler\Fuel;
use Yii;

/**
 * This is the model class for table "driver".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $tg
 * @property string|null $call
 * @property string|null $phone
 * @property string|null $car
 * @property string|null $default_fuel
 * @property string|null $default_town
 *
 * @property-read string $phoneView
 */
class Driver extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'driver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [

            [['phone'], 'filter', 'filter' => function($value) {
                return preg_replace('/\D/', '', $value);
            }],
            [['name', 'tg', 'phone'], 'required'],
            [['name', 'tg', 'call', 'phone', 'car', 'default_fuel', 'default_town'], 'default', 'value' => null],
            [['name', 'tg', 'call', 'phone', 'car', 'default_fuel', 'default_town'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'tg' => 'Телеграм',
            'call' => 'Позывной',
            'phone' => 'Телефон',
            'car' => 'Машина',
            'default_fuel' => 'Топливо по умолчанию',
            'default_town' => 'Город выезда по умолчанию',
        ];
    }

    /**
     * @return Fuel[]
     */
    public static function listFuels(): array
    {
        return Fuel::findAll();
    }

    /**
     * @return Town[]|array|array[]|\yii\db\ActiveRecord[]
     */
    public static function listTowns(): array
    {
        return Town::find()->all();
    }


}
