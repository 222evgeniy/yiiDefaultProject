<?php

namespace console\controllers;

use console\controllers\classes\GenerateUsers;
use console\controllers\classes\GenereteAlbums;

/**
 * Class UserGenegrateController
 *
 * @package console\controllers
 */
class UserGenegrateController extends \yii\console\Controller
{
    /**
     * @return array
     */
    public function actionIndex()
    {
        return[];
    }

    /**
     * Create fake users
     * @param $count
     *
     * @return void
     */
    public function actionGenerateUsers($count = 10)
    {
        for ($i = 0; $i <= $count; $i++) {
            $user = new GenerateUsers(['id' => $i]);
            $user->generator();
        }
    }

    /**
     * Generator Albums and Photo
     * @param $count
     *
     * @return void
     */
    public function actionGenerateAlbums($count = 100)
    {
        $generate = new GenereteAlbums();
        $generate->generator();
    }
}
