<?php

namespace console\controllers\classes;

use common\models\User;
use Exception;
use Yii;
use yii\base\BaseObject;

/**
 * Class GenerateUsers
 *
 * @package console\controllers\classes
 */
class GenerateUsers extends BaseObject
{
    /** @var int */
    public $id;

    /** @var string */
    private $name;

    public function generator()
    {
        try {
            $this->generateUserName();
            $this->create();
        } catch (\RuntimeException $e) {
            Yii::$app->errorHandler->logException($e);
            \yii\helpers\VarDumper::dump($e->getMessage(), 6, 0);
        }
    }

    /**
     * @return void
     * @throws \yii\base\Exception
     */
    private function create(): void
    {
        $user = new User();
        $user->username = $this->name;
        $user->email = $this->getEmail();
        $user->password = $this->getPassword();
        $user->generateAuthKey();
        $user->save(false);
    }

    /**
     * @return string
     */
    private function getEmail(): string
    {
        return $this->name.'@test.com';
    }

    /**
     * @return string
     * @throws Exception
     */
    private function getPassword(): string
    {
        return Yii::$app->security->generatePasswordHash(Yii::$app->params['password']);
    }

    /**
     * @return void
     */
    private function generateUserName(): void
    {
        $this->name = 'user_'.$this->id;
    }
}
