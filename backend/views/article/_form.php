<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="row">
    <div class="col-8">
        <?= $form->field($model, 'theme')->textInput(['maxlength' => true, 'autofocus' => true]) ?>

        <?= $form->field($model, 'authors')->widget(\dosamigos\tinymce\TinyMce::className()) ?>
    </div>
    <div class="col-4 bg-info" style="border-radius: 15px">
        <?= $form->field($model, 'journal_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Journal::find()->all(),'id','name'),['prompt'=>'']) ?>

        <?= $form->field($model, 'pagesOfJournal')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'file')->fileInput(['accept' => 'application/pdf', 'class' => 'form-control-file']) ?>

        <div class="form-group">
            <?= Html::submitButton(($model->isNewRecord) ? 'Yaratish' : 'Saqlash', ['class' => 'btn btn-success w-100']) ?>
        </div>
    </div>
</div>

<!--    --><?//= $form->field($model, 'created_at')->textInput() ?>

<!--    --><?//= $form->field($model, 'updated_at')->textInput() ?>

    <?php ActiveForm::end(); ?>

</div>
