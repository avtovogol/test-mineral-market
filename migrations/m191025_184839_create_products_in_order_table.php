<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products_in_order}}`.
 */
class m191025_184839_create_products_in_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products_in_order}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'product_id' => $this->integer(),
            'count' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-products_in_order-order_id',
            '{{%products_in_order}}',
            'order_id',
            'order',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-products_in_order-product_id',
            '{{%products_in_order}}',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-products_in_order-order_id',
            '{{%products_in_order}}'
        );
        $this->dropForeignKey(
            'fk-products_in_order-product_id',
            '{{%products_in_order}}'
        );

        $this->dropTable('{{%products_in_order}}');
    }
}
