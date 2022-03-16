<?php

namespace frontend\actions;

use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\Action;

/**
 * Class AlbumAction
 *
 * @package frontend\actions
 *
 * @property $modelClass
 */
class AlbumAction extends Action
{
    const EVENT_ID = 'event id';

    /**
     * @return ActiveDataProvider
     */
    public function run(): ActiveDataProvider
    {
        $id = Yii::$app->request->get('id');

        $query = $this->modelClass::find()->andFilterWhere(['id' => $id]);

        if(!empty($id)) {
            $query->with('photos', 'user');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 2,
            ]
        ]);

        return $dataProvider;
    }

}
