<?php

namespace common\models;

/**
 * Class UserModify
 *
 * @package common\models
 */
class UserModify extends User
{
    /**
     * @return array|false|int[]|string[]
     */
    public function fields()
    {
        $fields = [
            'id',
            'last_name',
            'first_name',
        ];

        if(!empty(\Yii::$app->request->get())) {
            $fields = array_merge($fields, ['albums']);
        }

        return $fields;
    }

    /**
     * @return array|array[]
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
           [['last_name', 'first_name'], 'string'],
        ]);
    }
}
