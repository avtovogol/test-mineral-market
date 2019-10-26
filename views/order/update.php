<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = 'Редактирование заказа ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] =$this->title ;
?>
<div class="order-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $products,
        'columns' => [
            ['value' => 'product.name', 'label' => 'Товар'],
            ['value' => 'count', 'label' => 'Количество'],
            [
                'class' => \yii\grid\ActionColumn::className(),

                'urlCreator' => function ($action, $model, $key, $index) {
                    return \yii\helpers\Url::to(['products-in-order/'.$action, 'id' => $model->id, 'order_id' => $model->order_id]);
                },
                'template' => '{delete}',
            ],
        ],
        'options' => ['style' => 'width:50%'],

    ]); ?>


    <?= Html::a('Добавить товар в заказ', \yii\helpers\Url::to(['products-in-order/create', 'order_id' => $model->id]), ['class' => 'btn btn-primary']) ?>

</div>

