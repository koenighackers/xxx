<?php

namespace frontend\rules;

use common\models\User;
use yii\base\BaseObject;
use yii\web\UrlRuleInterface;

class ShopRule extends BaseObject implements UrlRuleInterface
{
    public function createUrl($manager, $route, $params)
    {
        return false; // this rule does not apply
    }

    /**
     * @param \yii\web\UrlManager $manager
     * @param \yii\web\Request $request
     * @return array|bool
     * @throws \yii\base\InvalidConfigException
     */
    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();

        // s/<shopName>/<action>/<param>
        if (preg_match('%^s\/(\w+)\/?(\w+)?\/?(\w+)?$%', $pathInfo, $matches)) {
            // $matches[1] - shopName
            // $matches[2] - action
            // $matches[3] - param1

            $shopName = $matches[1];

            \Yii::$app->params['shopName'] = $shopName;
            \Yii::$app->params['shopOwner'] = User::findOne(['username' => $shopName]);

            if (!empty($matches[2])) {
                $action = $matches[2];
                if (!empty($matches[3])) {
                    $param = $matches[3];
                    return ['shop/' . $action, ['id' => $param]];
                }
                return ['shop/' . $action, []];
            }
        }
        return false; // this rule does not apply
    }
}