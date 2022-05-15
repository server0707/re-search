<?php

use common\models\Editorials;

/**
 * @var \yii\debug\models\timeline\DataProvider $journalsDataProvider
 * @var \common\models\Journal $journal
 * @var yii\web\View $this
 */

$this->title = 'Jurnal bo\'limlari';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-departments-of-journal">
    <h1 class="text-center text-uppercase"><?= $this->title ?></h1>

    <div class="mu-book-overview-content" style="margin-top: -10px">
        <div class="row">
            <!-- Book Overview Single Content -->
            <?php foreach ($journalsDataProvider->getModels() as $journal) : ?>
                <div class="col-md-3 col-sm-6">
                    <a href="<?= \yii\helpers\Url::to(['journal-details', 'id' => $journal->id]) ?>">
                        <div class="mu-book-overview-single">
											<span class="mu-book-overview-icon-box">
												<i class="fa fa-book" style="color: #217ed3" aria-hidden="true"></i>
											</span>
                            <p><?=$journal->name?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            <!-- / Book Overview Single Content -->
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