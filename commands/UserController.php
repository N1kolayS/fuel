<?php

namespace app\commands;

use app\models\User;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;


class UserController extends Controller
{

    /**
     * @param $username
     * @param $phone
     * @param $password
     * @return int
     * @throws \yii\db\Exception
     */
    public function actionCreate($username, $phone, $password): int
    {


        if (User::find()->where(['phone' => $phone])->exists()) {
            $this->stderr("Ошибка: Пользователь с phone '{$phone}' уже существует\n", Console::FG_RED);
            return ExitCode::DATAERR;
        }

        $user = new User();
        $user->username = $username;
        $user->phone = $phone;

        $user->setPassword($password);
        $user->generateAuthKey();
        $user->status = User::STATUS_ACTIVE;

        if ($user->save()) {
            $this->stdout("Успех: Пользователь создан!\n", Console::FG_GREEN);
            $this->stdout("ID: {$user->id}\n");
            $this->stdout("Username: {$user->username}\n");
            $this->stdout("Phone: {$user->phone}\n");

            $this->stdout("Created: " . date('Y-m-d H:i:s', $user->created_at) . "\n");

            return ExitCode::OK;
        } else {
            $this->stderr("Ошибка при создании пользователя:\n", Console::FG_RED);

            foreach ($user->errors as $attribute => $errors) {
                foreach ($errors as $error) {
                    $this->stderr(" - {$attribute}: {$error}\n", Console::FG_RED);
                }
            }

            return ExitCode::DATAERR;
        }
    }
}