<?php

use yii\db\Migration;

/**
 * Class m220315_091633_album
 */
class m220315_091633_album extends Migration
{
    /** @var string */
    private $table_name;

    /**
     * @return void
     */
    public function init()
    {
        $this->table_name = 'albums';
        parent::init(); // TODO: Change the autogenerated stub
    }
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table_name, [
            'id' => $this->primaryKey(10),
            'user_id' => $this->integer(10)->notNull(),
            'title' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table_name);
    }
}
