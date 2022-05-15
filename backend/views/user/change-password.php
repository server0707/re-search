<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \backend\models\ChangePasswordForm */

$this->title = 'Parolni o\'zgartirish: ' . $model->_user->username;
$this->params['breadcrumbs'][] = ['label' => 'Adminlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->_user->username, 'url' => ['view', 'id' => $model->_user->id]];
$this->params['breadcrumbs'][] = 'Parolni o\'zgartirish';
?>
<div class="user-update">

    <!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?php $form = \yii\bootstrap4\ActiveForm::begin(); ?>

    <?= $form->field($model, 'current_password')->passwordInput() ?>

    <?= $form->field($model, 'new_password')->passwordInput() ?>

    <?= $form->field($model, 'confirm_password')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success w-100']) ?>
    </div>

    <?php \yii\bootstrap4\ActiveForm::end(); ?>

</div>
