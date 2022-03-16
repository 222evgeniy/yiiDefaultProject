<?php

namespace frontend\actions;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\rest\Action;

/**
 * Class UsersAction
 *
 * @property string|ActiveRecord $modelClass
 */
class UsersAction extends Action
{
    /**
     * @return ActiveDataProvider
     */
    public function run()
    {
        $id = Yii::$app->request->get('id');

        $query = $this->getQuery()
            ->andFilterWhere(['id' => $id]);

        if(!empty($id)) {
            $query->with('albums');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 2,
            ]
        ]);

        return $dataProvider;
    }

    /**
     * @return ActiveQuery
     */
    protected function getQuery()
    {
        return $this->modelClass::find();
    }
}
