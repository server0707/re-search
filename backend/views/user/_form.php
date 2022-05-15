<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?php if ($model->isNewRecord) : ?>
    <?= $form->field($model, 'new_password')->passwordInput() ?>
    <?php endif; ?>

    <?= $form->field($model, 'status')->radioList([\common\models\User::STATUS_ACTIVE => 'Faol', \common\models\User::STATUS_INACTIVE => 'Nofaol']) ?>

    <div class="form-group">
        <?= Html::submitButton(($model->isNewRecord) ? 'Yaratish' : 'Saqlash', ['class' => 'btn btn-success w-100']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
