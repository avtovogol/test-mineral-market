<?php

use yii\db\Migration;

/**
 * Class m191025_194525_add_test_data
 */
class m191025_194525_add_test_data_at_product_and_order_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $faker = \Faker\Factory::create('ru_RU');

        for ($i = 1; $i < 11; $i++) {
            $this->insert(
                '{{%product}}',
                [
                    'id' => $i,
                    'name' => $faker->word,
                    'count' => random_int(20, 100),
                ]
            );
        }
        for ($i = 1; $i < 11; $i++) {
            $this->insert(
                '{{%order}}',
                [
                    'id' => $i,
                    'status' => 0,
                ]
            );
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191025_194525_add_test_data cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191025_194525_add_test_data cannot be reverted.\n";

        return false;
    }
    */
}
