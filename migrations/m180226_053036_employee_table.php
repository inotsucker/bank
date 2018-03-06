<?php

use yii\db\Migration;

/**
 * Class m180226_053036_employee_table
 */
class m180226_053036_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180226_053036_employee_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180226_053036_employee_table cannot be reverted.\n";

        return false;
    }
    */
}
