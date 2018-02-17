<?php

namespace frontend\components;
use \common\models\Category ;
use yii\db\ActiveRecord;

/**
 * Categories component.
 */

class Categories {

    public static $limit = 10;
    public static $showInactive = false;

    /**
     * Get list of the user categories
     * @param array $options additional options
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList($options = [])
    {
        $query = Category::find()->where(['user_id' => \Yii::$app->user->identity->getId()]);

        if (isset($options['limit'])) {
            self::$limit = $options['limit'];
        }

        if (isset($options['showInactive'])) {
            self::$showInactive = $options['showInactive'];
        }

        if (!self::$showInactive) {
            $query->andWhere(['status' => true]);
        }

        return $query->limit(self::$limit)->all();
    }

}