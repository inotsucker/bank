<?php

use yii\db\Migration;

/**
 * Class m180301_115240_country_table
 */
class m180301_115240_country_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('country',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'short_name' => $this->string(),
            'country_code' => $this->string(),
            'created_at' => $this->timestamp()->defaultValue(0),
            'updated_at' => $this->timestamp()->defaultValue(0),
            'is_deleted' => $this->boolean()->defaultValue(false),
        ])
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180301_115240_country_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180301_115240_country_table cannot be reverted.\n";

        return false;
    }
    */
}
