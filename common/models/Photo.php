<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * Class Photo
 *
 * @property integer $album_id
 * @property string $title
 *
 * @package common\models
 */
class Photo extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%photo}}';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['album_id', 'integer'],
            ['title', 'string']
        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels()
    {
        return [
            'id' => "Id",
            'album_id' => 'album_id',
            'title' => 'title',
        ];
    }
}
