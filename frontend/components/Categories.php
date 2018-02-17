<?php

namespace frontend\components;
use \common\models\Category ;
use yii\db\ActiveRecord;

/**
 * Categories component.
 */

class Categories {

    public static $limit = 10;

    /**
     * Get list of the user categories
     * @param array $options additional options
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getList($options = [])
    {
        if (isset($options['limit'])) {
            self::$limit = $options['limit'];
        }

        return Category::find()
            ->where(['user_id' => \Yii::$app->user->identity->getId()])
            ->limit(self::$limit)
            ->all();
    }

}