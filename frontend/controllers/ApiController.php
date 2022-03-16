<?php

namespace frontend\controllers;

use common\models\Album;
use common\models\UserModify;
use frontend\actions\AlbumAction;
use frontend\actions\UsersAction;
use yii\rest\ActiveController;
use yii\web\Response;


class ApiController extends ActiveController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['languageParam'] = 'languages';
        $behaviors['contentNegotiator']['formats']['application/vnd.siren+json'] = Response::FORMAT_JSON;
        $behaviors['contentNegotiator']['formats']['application/hal+json'] = Response::FORMAT_JSON;

        return $behaviors;
    }

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
