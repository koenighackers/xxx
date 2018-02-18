<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\AppAsset;

AppAsset::register($this);

$catList = \frontend\components\Categories::getList();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <script src="https://unpkg.com/vue@2.5.13/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container-fluid">
    <div class="row">
        <div class="sidebar" id="sidebar">
            <div class="sidebar__header">
                <h1><?= ucfirst(Yii::$app->params['shopName']) ?></h1>
            </div>
            <div class="sidebar__content sd">
                <div class="sd__header">Сategories <div class="pull-right btn btn-success btn-xs" @click="addCatFormHidden = !addCatFormHidden"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></div></div>
                <div class="sd__add-cat-form" style="margin-top: 10px; background: #fff; padding: 5px;" v-if="!addCatFormHidden">
                    <form action="#!" class="form">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Название">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Описание" style="resize: none;"></textarea>
                        </div>
                        <div class="text-right">
                            <div class="btn btn-default"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
                            <div class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></div>
                        </div>
                    </form>
                </div>
                <div class="sd__items">
                    <?php
                    foreach ($catList as $catModel) :
                    ?>
                        <a href="#!" class="sd-item__link" @click="refreshMessage">
                            <?= $catModel->name ?>
                        </a>
                    <?php
                    endforeach;
                    ?>
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

<script>
    var app = new Vue({
        el: '#sidebar',
        data: function () {
            return {
                message: '',
                addCatFormHidden: true
            }
        },
        methods: {
            refreshMessage: function () {
                axios.get('/s/<?= Yii::$app->params['shopName'] ?>/test')
                    .then(function (response) {
                        app.message = response.data.message;
                    })
                    .catch(function (error) {
                        console.log(error)
                    });
            }
        }
    });
</script>