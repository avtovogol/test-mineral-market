<?php

use app\models\Order;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id')->textInput(['style'=>'width:100px']) ?>

    <?= $form->field($model, 'status')->dropDownList(
        [
            Order::STATUS_NOT_COMPLETED => 'Не выполнен',
            Order::STATUS_COMPLETED => 'Выполнен'
        ],
        ['style'=>'width:150px']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сброс', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
