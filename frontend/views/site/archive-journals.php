<?php

/**
 * @var \yii\debug\models\timeline\DataProvider $journalsDataProvider
 * @var $years
 * @var integer $year
 * @var integer $month
 * @var yii\web\View $this
 */
$month_names = ['Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'Iyun', 'Iyul', 'Avgust', 'Sentabr', 'Oktabr', 'Noyabr', 'Dekabr'];

$this->title = 'ARXIV(' . $year . '-' . $month_names[$month - 1] . ') - Jurnallar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-archive-journals">
    <h1 class="text-center text-uppercase"><?= $this->title ?></h1>
    <div class="row">
        <div class="col-3">
            <div class="bg-light border-right panel panel-primary" id="sidebar-wrapper">
                <div class="sidebar-heading panel-default" style="padding: 5px;font-size: 18px"><b>Arxiv</b></div>
                <div class="list-group list-group-flush">
                    <?php foreach ($years as $year) : ?>
                        <a href="<?= \yii\helpers\Url::to(['site/archive-months', 'year' => $year['year']]) ?>"
                           class="list-group-item list-group-item-action bg-light">To'plam <?= $year['year'] ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="mu-counter-area" style="margin-top: -100px">
                <div class="mu-counter-block">
                    <div class="row">
                        <!-- Start Single Counter -->
                        <?php foreach ($journalsDataProvider->getModels() as $journal) : ?>
                            <div class="col-md-4 col-sm-6" style="margin-top: 40px">
                                <a href="/journals/<?= $journal['file_name'] ?>">
                                    <div class="mu-single-counter">
                                        <i class="fa fa-archive" style="color: #217ed3" aria-hidden="true"></i>
                                        <div class="counter-value" style="font-size: 15px;color: #217ed3;">
                                            <?= $journal['name'] ?>
                                        </div>

                                        <p>Pages: <?= $journal['pages_count'] ?></p>
                                        <h5 style="font-size: 15px"
                                            class="mu-counter-name"><?= $journal['published'] ?></h5>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                        <!-- / Single Counter -->
                    </div>
                </div>
            </div>
            <?php
            echo \yii\bootstrap4\LinkPager::widget([
                'pagination' => $journalsDataProvider->pagination,
                'options' => [
                    'class' => 'float-right'
                ]
            ]);
            ?>
        </div>
    </div>
</div>
