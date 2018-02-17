<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:300,400,700&amp;subset=cyrillic" rel="stylesheet">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container-fluid">
    <div class="row">
        <div class="sidebar">
            <div class="sidebar__header">
                <h1>LOGO</h1>
            </div>
            <div class="sidebar__content sd">
                <div class="sd__header">Сategories</div>
                <div class="sd__items">
                    <a href="#!" class="sd-item__link">
                        Item 1
                    </a>
                    <a href="#!" class="sd-item__link">
                        Item 2
                    </a>
                    <a href="#!" class="sd-item__link">
                        Item 3
                    </a>
                    <a href="#!" class="sd-item__link">
                        Item 4
                    </a>
                    <a href="#!" class="sd-item__link">
                        Item 5
                    </a>
                    <a href="#!" class="sd-item__link">
                        Item 6
                    </a>
                    <a href="#!" class="sd-item__link">
                        Item 7
                    </a>
                    <a href="#!" class="sd-item__link">
                        Item 8
                    </a>
                    <a href="#!" class="sd-item__link">
                        Item 9
                    </a>
                    <a href="#!" class="sd-item__link">
                        Item 10
                    </a>
                </div>
            </div>
            <div class="sidebar__footer">#</div>
        </div>
        <div class="content c">
            <div class="c-cart c-cart--horizontal">
                <div class="c-card__header">
                    <h3>Корзина</h3>
                </div>
                <div class="c-cart__previews">
                    <div class="simple"></div>
                    <div class="simple"></div>
                    <div class="simple"></div>
                    <div class="clearfix"></div>
                </div>

            </div>
            <div class="c-wrapper">
                <div class="c-wrappper__header">
                    <h3>#catalog</h3>
                </div>
                <div class="c-wrapper__products c-w">
                    <div class="simple simple--big"></div>
                    <div class="simple simple--big"></div>
                    <div class="simple simple--big"></div>
                    <div class="simple simple--big"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
