<?php

namespace app\controllers;

use app\models\Order;
use Yii;
use app\models\ProductsInOrder;
use app\models\ProductsInOrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductsInOrderController implements the CRUD actions for ProductsInOrder model.
 */
class ProductsInOrderController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Creates a new ProductsInOrder model.
     * @return mixed
     */
    public function actionCreate($order_id)
    {
        $model = new ProductsInOrder();
        $model->order_id = $order_id;
        $order = Order::findOne($order_id);
        $products = $order->getProductNotIssetInOrder();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['order/update', 'id' => $model->order->id]);
        }
            return $this->render('create', [
                'model' => $model,
                'products' => $products,
            ]);
    }

    /**
     * Deletes an existing ProductsInOrder model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $order_id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['order/update','id' => $order_id]);
    }

    /**
     * Finds the ProductsInOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductsInOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductsInOrder::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
