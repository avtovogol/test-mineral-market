<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsInOrder */

$this->title = 'Добавление товара в заказ ' . $model->order_id;
$this->params['breadcrumbs'][] = ['label' => 'Изменение заказа ' . $model->order_id , 'url' => ['order/update','id' =>$model->order_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-in-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'products' => $products
    ]) ?>

</div>
