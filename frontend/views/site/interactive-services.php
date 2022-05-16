<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\captcha\Captcha;

/**
 * @var yii\web\View $this
 * @var \common\models\InteractiveServices $model
 */

$this->title = 'Interaktiv xizmatlar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-interactive-services">
    <h1 class="text-center text-uppercase"><?= $this->title ?></h1>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'fullName')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'type')->dropdownList(['Maqola uchun UDK raqam olish' => 'Maqola uchun UDK raqam olish', 'Disertatsiya uchun UDK olish' => 'Disertatsiya uchun UDK olish', 'Antiplagiatda tekshirish' => 'Antiplagiatda tekshirish'], ['prompt' => '']) ?>

    <?= $form->field($model, 'file')->fileInput(['accept' => '.doc, .docx', 'class' => 'form-control-file']) ?>

    <?= $form->field($model, 'phone')->input('number') ?>

    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Jo\'natish', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>