<?php

namespace app\components;


use yii\i18n\Formatter as BaseFormatter;

class Formatter extends BaseFormatter
{
    public function asPhone($value): ?string
    {
        if (empty($value)) {
            return $this->nullDisplay;
        }

        $digits = preg_replace('/[^0-9]/', '', $value);

        if (strlen($digits) === 11) {
            return sprintf(
                '%s(%s)%s-%s-%s',
                substr($digits, 0, 1),
                substr($digits, 1, 3),
                substr($digits, 4, 3),
                substr($digits, 7, 2),
                substr($digits, 9, 2)
            );
        }

        return $value;
    }
}