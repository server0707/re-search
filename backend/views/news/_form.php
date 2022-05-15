<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'autofocus' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>

            <?= $form->field($model, 'content')->widget(\dosamigos\tinymce\TinyMce::className()) ?>
        </div>
        <div class="col-4 bg-info" style="border-radius: 15px">
            <?= $form->field($model, 'status')->radioList([\common\models\News::STATUS_INACTIVE => 'Nofaol', \common\models\News::STATUS_ACTIVE => 'Faol']) ?>

            <?php
            echo $form->field($model, "keywords")->widget(\yii2mod\selectize\Selectize::className(), [
                'url' => '/admin/keyword/search',
                'pluginOptions' => [
                    'valueField' => 'name',
                    'labelField' => 'name',
                    'searchField' => ['name'],
                    'persist' => false,
                    'createOnBlur' => true,
                    'create' => true
                ]
            ]);
            ?>

            <?= $form->field($model, 'image')->fileInput(['accept' => 'image/*', 'class' => 'form-control-file']) ?>
            <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*', 'class' => 'form-control-file']) ?>

            <div class="form-group">
                <?= Html::submitButton(($model->isNewRecord) ? 'Yaratish' : 'Saqlash', ['class' => 'btn btn-success w-100']) ?>
            </div>
        </div>
    </div>

    <!--    --><? //= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <!--    --><? //= $form->field($model, 'created_at')->textInput() ?>

    <!--    --><? //= $form->field($model, 'updated_at')->textInput() ?>

    <?php ActiveForm::end(); ?>

</div>
