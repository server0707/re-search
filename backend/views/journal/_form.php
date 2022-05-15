<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Journal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="journal-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-8">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'autofocus' => true]) ?>
        </div>
        <div class="col-4 bg-info" style="border-radius: 15px">
            <div class="row">
                <div class="col-6">
                    <?= $form->field($model, 'pages_count')->input('number') ?>
                </div>
                <div class="col-6">
                    <?= $form->field($model, 'published')->input('date') ?>
                </div>
            </div>

            <?= $form->field($model, 'file')->fileInput(['accept' => 'application/pdf', 'class' => 'form-control-file']) ?>

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
