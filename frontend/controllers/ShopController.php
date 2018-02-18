<?php
namespace frontend\controllers;

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

    public function actionTest()
    {
        $response = [
            'shopName' => Yii::$app->params['shopName'],
            'message' => 'test' . time(),
        ];

        Yii::$app->response->format = Response::FORMAT_JSON;

        return $response;
    }
}
