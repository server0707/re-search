<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \frontend\models\ContactForm $model */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Aloqa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <p><b>Telefon: </b> <a href="tel:+123456789555">+123456789555</a></p>
            <p><b>E-mail: </b> <a href="<?= Yii::$app->params['supportEmail'] ?>"><?=Yii::$app->params['supportEmail']?></a></p>
            <p><b>Manzilimiz: </b> <a href="https://goo.gl/maps/KpZ1QokPpypRuj1Y6">Toshkent shahar ....</a></p>
            <br>

            <h3 class="text-center">
                Siz bilan bog'lanishimiz uchun habar qoldiring.
            </h3>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-9">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Jo\'natish', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-3"></div>
    </div>

</div>
