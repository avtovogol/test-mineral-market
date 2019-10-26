<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $status
 *
 * @property ProductsInOrder[] $productsInOrders
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const STATUS_NOT_COMPLETED = 0;
    const STATUS_COMPLETED = 1;

    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsInOrders()
    {
        return $this->hasMany(ProductsInOrder::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])->viaTable('products_in_order', ['order_id' => 'id']);
    }

    /*
     * @return array
     */
    public function getProductNotIssetInOrder()
    {
        $subQuery = new \yii\db\Query();
        $subQuery->select(['product_id'])
            ->from('order')
            ->where(['order.id' => $this->id])
            ->innerJoin('products_in_order', 'products_in_order.order_id = order.id');
        $query = new \yii\db\Query();
        $query->select(['product.id', 'product.name'])
            ->from('product')
            ->where(['not in', 'id', $subQuery]);
        return  $query->all();
    }

    /*
     * @return string
     */
    public function getStatusName()
    {
        switch($this->status) {
            case Order::STATUS_NOT_COMPLETED:
                return 'Не выполнен';
                break;
            case Order::STATUS_COMPLETED;
                return 'Выполнен';
                break;
        }
    }
}
