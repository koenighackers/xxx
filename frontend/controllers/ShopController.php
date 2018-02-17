<?php
namespace frontend\controllers;

use Yii;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Shop controller
 */
class ShopController extends Controller
{
    /**
     * Displays shop page.
     * @throws
     * @return mixed
     */
    public function actionIndex($shopName)
    {
        if (trim($shopName) == '') {
            return $this->goHome();
        }

        $model = User::findOne(['username' => $shopName]);
        
        if ($model === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
