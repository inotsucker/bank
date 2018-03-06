<?php

use yii\db\Migration;

/**
 * Class m180226_050227_customer_table
 */
class m180226_050227_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customer',[
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'ic' => $this->string(),
            'dob' => $this->dateTime(),
            'gender' => $this->char(),
            'email' => $this->string(),
            'address' => $this->string(),
            'postcode' => $this->string(),
            'city' => $this->string(),
            'state' => $this->string(),
            'country' => $this->string(),
            'country_code' => $this->string(),
            'contact_number' => $this->string(),
            'remark' => $this->string(),
            'created_at' => $this->timestamp()->defaultValue(0),
            'updated_at' => $this->timestamp()->defaultValue(0),
            'is_suspended' => $this->boolean()->defaultValue(0),
            'is_deleted' => $this->boolean()->defaultValue(0),
        ])
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180226_050227_customer_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180226_050227_customer_table cannot be reverted.\n";

        return false;
    }
    */
}
