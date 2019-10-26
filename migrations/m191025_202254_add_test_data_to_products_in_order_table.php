<?php

use yii\db\Migration;

/**
 * Class m191025_202254_add_test_data_to_products_in_order_table
 */
class m191025_202254_add_test_data_to_products_in_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        for ($i = 1; $i < 31; $i++) {
            $this->insert(
                '{{%products_in_order}}',
                [
                    'id' => $i,
                    'order_id' => random_int(1, 10),
                    'product_id' => random_int(1, 10),
                    'count' => random_int(1, 10),
                ]
            );
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191025_202254_add_test_data_to_products_in_order_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191025_202254_add_test_data_to_products_in_order_table cannot be reverted.\n";

        return false;
    }
    */
}
