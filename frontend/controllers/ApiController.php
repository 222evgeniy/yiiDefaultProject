<?php

namespace frontend\controllers;

use common\models\Album;
use common\models\UserModify;
use frontend\actions\AlbumAction;
use frontend\actions\UsersAction;
use yii\rest\ActiveController;


class ApiController extends ActiveController
{
    public $modelClass = UserModify::class;

    protected function verbs()
    {
        return [
            'users' => ['GET'],
            'albums' => ['GET']
        ];
    }

    public function actions()
    {
        return [
            'users' => [
                'class' => UsersAction::class,
                'modelClass' => UserModify::class
            ],
            'albums' => [
              'class' => AlbumAction::class,
              'modelClass' => Album::class,
            ] ,
        ];
    }
}
