<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * Class Album
 *
 * @property  integer $user_id
 * @property  string $title
 * @property string $url
 *
 * @package common\models
 */
class Album extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%albums}}';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['user_id', 'integer'],
            [['title'], 'string']
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::class, ['album_id' => 'id']);
    }

    /**
     * @return string[]
     */
    public function attributeLabels()
    {
        return [
            'id' => "Id",
            'albumId' => 'AlbumId',
            'title' => 'title',
        ];
    }

    /**
     * @return array|false|int[]|string[]
     */
    public function fields()
    {
        $fields = [
            'id',
            'title',
        ];

        if(!empty(\Yii::$app->request->get())) {
            $fields = array_merge($fields, [
                'last_name' => function($model) {
                    return $model->user->last_name;
                },
                'first_name' => function($model) {
                    return $model->user->first_name;
                },
                'photos'
            ]);
        }

        return $fields;
    }
}
