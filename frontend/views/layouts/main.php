<?php

/** @var \yii\web\View $this */

/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <?php $this->head() ?>
    </head>
    <body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        NavBar::begin([
            'brandLabel' => \yii\helpers\Html::img('@web/images/logo.png', [
                'alt' => Yii::$app->name,
                'style' => 'width: 90px; background-color: white; border-radius: 20px'
            ]),
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand-md navbar-dark fixed-top',
                'style' => 'background-color: #217ed3;'
            ],
        ]);
        $menuItems = [
            ['label' => 'Bosh sahifa', 'url' => ['/']],
            ['label' => 'Umumiy ma\'lumot', 'url' => ['about']],
            ['label' => 'Yangiliklar', 'url' => ['news']],
            ['label' => 'Tahririyat', 'url' => ['editorial']],
            ['label' => 'Arxiv', 'url' => ['archive']],
            ['label' => 'Jurnal bo\'limlari', 'url' => ['departments-of-journal']],
            ['label' => 'Aloqa', 'url' => ['contact']],
            ['label' => 'Interaktiv xizmatlar', 'url' => ['site/interactive-services']],
            ['label' => 'Adminstatsiya', 'url' => ['/admin'], 'options' => ['class' => 'ml-auto']],
        ];

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ml-auto', 'style' => 'font-size: 20px'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>
    </header>

    <main role="main" class="flex-shrink-0" style="padding-top: 7rem!important;">

        <?php if (Yii::$app->controller->route == 'site/index') : ?>
            <section class="banner">
                <div class="jumbotron text-center bg-transparent text-white">
                    <h1 class="display-4 text-info font-weight-bold">Ziyo scientific center</h1>

                    <p class="lead">ilmiy tadqiqotlar markazi 1119360-sonli guvohnoma asosida faoliyatini yuritadi.</p>

                    <p><a class="btn btn-lg btn-success" href="<?= \yii\helpers\Url::to(['site/contact']) ?>">Biz bilan
                            aloqa</a></p>
                </div>
            </section>
        <?php endif; ?>

        <div style="width: 95%; padding-top: 50px;" class="mx-auto">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted">
        <div class="container">
            <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
            <p class="float-right"><b>E-mail: </b> <a href="mailto:<?= Yii::$app->params['supportEmail'] ?>"><?= Yii::$app->params['supportEmail'] ?></a></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage();
