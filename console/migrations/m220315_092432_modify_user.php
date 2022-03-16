<?php

use common\models\User;
use yii\db\Migration;

/**
 * Class m220315_092432_modify_user
 */
class m220315_092432_modify_user extends Migration
{
    /**
     * @var string
     */
    private $table;

    /**
     * @return void
     */
    public function init()
    {
        $this->table = User::tableName();
        parent::init(); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->table, 'first_name',$this->string(255));
        $this->addColumn($this->table, 'last_name',$this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->table, 'first_name');
        $this->dropColumn($this->table, 'last_name');
    }
}
