<?php

use app\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsInOrder */
/* @var $form yii\widgets\ActiveForm */

?>


<div class="products-in-order-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php

    $items = ArrayHelper::map($products, 'id', 'name');
    ?>
    <?= $form->field($model, 'product_id')->dropDownList($items)->label('Товар') ?>

    <?= $form->field($model, 'count')->input('number', ['min' => 1, 'max' => 10, 'value' => 1])->label('Количество') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
