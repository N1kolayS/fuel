<?php

namespace app\models;

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
            'name' => 'Name',
            'tg' => 'Tg',
            'call' => 'Call',
            'phone' => 'Phone',
            'car' => 'Car',
            'default_fuel' => 'Default Fuel',
            'default_town' => 'Default Town',
        ];
    }

}
