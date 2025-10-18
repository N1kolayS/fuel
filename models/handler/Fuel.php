<?php

namespace app\models\handler;

/**

 * @property string $name

 */
class Fuel
{

    public string $name;


    const BENZIN_92 = 'АИ92';
    const BENZIN_95 = 'АИ95';
    const DIESEL = 'ДТ';


    /**
     * @var array|array[]
     */
    private static array $_data = [
        self::BENZIN_92 => [
            'name' => self::BENZIN_92,

        ],
        self::BENZIN_95 => [
            'name' => self::BENZIN_95,

        ],
        self::DIESEL => [
            'name' => self::DIESEL,

        ],


    ];


    /**
     * @return static[]
     */
    public static function findAll(): array
    {
        $models = [];

        foreach (static::$_data as $datum)
        {
            $model = (new static());
            $model->name = $datum['id'];
            $models[$datum['id']] = $model;

        }
        return $models;
    }


    /**
     * @param $id
     * @return self|null
     */
    public static function findOne($id): ?self
    {
        return static::findAll()[$id] ?? null;
    }

}