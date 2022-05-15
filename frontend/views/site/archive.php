<?php

/**
 * @var \yii\debug\models\timeline\DataProvider $yearsDataProvider
 * @var yii\web\View $this
 */

$this->title = 'ARXIV - Yillar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-archive">
    <h1 class="text-center text-uppercase"><?= $this->title ?></h1>

    <div class="row">
        <div class="col-md-12" style="margin-top: -50px">
            <div class="mu-counter-area">
                <div class="mu-counter-block">
                    <div class="row">
                        <!-- Start Single Counter -->
                        <?php foreach ($yearsDataProvider->getModels() as $year) : ?>
                            <div class="col-md-3 col-sm-6" style="margin-top: 40px">
                                <a href="<?= \yii\helpers\Url::to(['site/archive-months', 'year' => $year['year']]) ?>">
                                    <div class="mu-single-counter">
                                        <i class="fa fa-archive" style="color: #217ed3" aria-hidden="true"></i>
                                        <div class="counter-value" style="font-size: 15px;color: #217ed3;height: 40px">
                                            To'plam <?= $year['year'] ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                        <!-- / Single Counter -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    echo \yii\bootstrap4\LinkPager::widget([
        'pagination' => $yearsDataProvider->pagination,
        'options' => [
            'class' => 'float-right'
        ]
    ]);
    ?>

</div>
