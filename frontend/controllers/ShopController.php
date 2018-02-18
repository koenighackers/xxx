<?php
namespace frontend\controllers;

use common\models\Product;
use Yii;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Shop controller
 */
class ShopController extends Controller
{
    public function init()
    {
        parent::init();

        $this->layout = 'shop';
    }

    /**
     * Displays shop page.
     * @param string $shopName
     * @throws
     * @return mixed
     */
    public function actionIndex($shopName)
    {
        if (trim($shopName) == '') {
            return $this->goHome();
        }

        Yii::$app->params['owner'] = User::findOne(['username' => $shopName]);

        $model = User::findOne(['username' => $shopName]);
        
        if ($model === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionCategory($id)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $products = Product::find()->where(['category_id' => $id])->asArray()->all();

        return $products;
    }
}
