<footer class="main-footer">
    <strong>Copyright &copy; <?= \yii\bootstrap4\Html::encode(Yii::$app->name) ?> <?= date('Y') ?> </strong>
    <div class="float-right d-none d-sm-inline-block">
        <b>E-mail: </b> <a href="mailto:<?= Yii::$app->params['supportEmail'] ?>"><?= Yii::$app->params['supportEmail'] ?></a>
    </div>
</footer>