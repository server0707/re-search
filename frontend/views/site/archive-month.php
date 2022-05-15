<?php

/**
 * @var \yii\debug\models\timeline\DataProvider $monthsDataProvider
 * @var integer $year
 * @var yii\web\View $this
 */

$this->title = 'ARXIV(' . $year . ') - Oylar';

$month_names = ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'Iyun', 'Iyul', 'Avgust', 'Sentabr', 'Oktabr', 'Noyabr', 'Dekabr'];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-archive-moth">
    <h1 class="text-center text-uppercase"><?= $this->title ?></h1>

    <div class="row">
        <div class="col-md-12" style="margin-top: -50px">
            <div class="mu-counter-area">
                <div class="mu-counter-block">
                    <div class="row">
                        <!-- Start Single Counter -->
                        <?php foreach ($monthsDataProvider->getModels() as $month) : ?>
                            <div class="col-md-3 col-sm-6" style="margin-top: 40px">
                                <a href="<?= \yii\helpers\Url::to(['site/archive-journals', 'year' => $year, 'month' => $month['month']]) ?>">
                                    <div class="mu-single-counter">
                                        <i class="fa fa-archive" style="color: #217ed3" aria-hidden="true"></i>
                                        <div class="counter-value" style="font-size: 15px;color: #217ed3;height: 40px">
                                            <?= $month_names[$month['month'] - 1] ?>
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
        'pagination' => $monthsDataProvider->pagination,
        'options' => [
            'class' => 'float-right'
        ]
    ]);
    ?>

</div>
