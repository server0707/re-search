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
        <div class="col-lg-6">
            <h3 class="text-center">
                Siz bilan bog'lanishimiz uchun habar qoldiring.
            </h3>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Jo\'natish', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2995.525501192605!2d69.28454511479528!3d41.34093030683797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8b534175ed31%3A0x52a8f9d9414a2ad8!2sAlxorazmiy%20Nomidagi%20Toshkent%20axborot%20texnologiyalari%20universiteti!5e0!3m2!1suz!2s!4v1652603733840!5m2!1suz!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            <br>
            <p><b>Telefon: </b> <a href="tel:+123456789555">+123456789555</a></p>
            <p><b>E-mail: </b> <a href="<?= Yii::$app->params['supportEmail'] ?>"><?=Yii::$app->params['supportEmail']?></a></p>
            <p><b>Manzilimiz: </b> <a href="https://goo.gl/maps/KpZ1QokPpypRuj1Y6">Toshkent shahar ....</a></p>
        </div>
    </div>

</div>
