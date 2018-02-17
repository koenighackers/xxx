<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\RegistrationForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'registration-form'
    ]); ?>
    <?= $form->field($model, 'shopName')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'registration-button']) ?>
    <?php ActiveForm::end(); ?>
</div>
