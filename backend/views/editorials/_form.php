<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Editorials */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="editorials-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'autofocus' => true]) ?>

            <?= $form->field($model, 'fullName')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['maxlength' => true]) ?>
        </div>
        <div class="col-4 bg-info" style="border-radius: 15px">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'view_number')->input('number') ?>

            <?= $form->field($model, 'image')->fileInput(['accept' => 'image/*', 'class' => 'form-control-file']) ?>

            <div class="form-group">
                <?= Html::submitButton(($model->isNewRecord) ? 'Yaratish' : 'Saqlash', ['class' => 'btn btn-success w-100']) ?>
            </div>
        </div>
    </div>


    <!--    --><? //= $form->field($model, 'created_at')->textInput() ?>

    <!--    --><? //= $form->field($model, 'updated_at')->textInput() ?>

    <?php ActiveForm::end(); ?>

</div>
