<?php

/**
 * @var \yii\debug\models\timeline\DataProvider $articlesDataProvider
 * @var \common\models\Article $article
 * @var \common\models\Journal $current_journal
 * @var \common\models\Journal[] $journals
 * @var yii\web\View $this
 */

$this->title = 'Maqolalar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-journal-details">
    <h1 class="text-center text-uppercase"><?= $this->title ?></h1>
<div class="row">
    <div class="col-3">
        <div class="bg-light border-right panel panel-primary" id="sidebar-wrapper">
            <div class="sidebar-heading panel-default" style="padding: 15px;font-size: 18px"><b>Jurnal bo'limlari</b></div>
            <div class="list-group list-group-flush">
                <?php foreach ($journals as $journal) : ?>
                <a href="<?= \yii\helpers\Url::to(['journal-details', 'id' => $journal->id]) ?>" class="list-group-item list-group-item-action bg-light  "><?=$journal->name?></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div class="panel panel-default">
            <div class="panel-body"><b style="font-size: 18px"><?= $current_journal->name ?></b></div>
            <div class="panel-footer">
                <?php foreach ($articlesDataProvider->getModels() as $article): ?>
                    <div class="panel panel-default" style="padding: 8px">

                        <a href="/articles/<?=$article->file_name?>"><i class="fa fa-check"></i> <?=$article->theme?></a>
                        <p><?=$article->authors?></p>
                        <p><i class="fa fa-calendar"></i> <?=date('Y-m-d',$article->created_at)?></p>
                        <p><i class="fa fa-file"></i> <?=$article->pagesOfJournal?></p>
                        <a href="/articles/<?=$article->file_name?>"><i class="fa fa-download"></i> Yuklab olish</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            echo \yii\bootstrap4\LinkPager::widget([
                'pagination' => $articlesDataProvider->pagination,
                'options' => [
                    'class' => 'float-right'
                ]
            ]);
            ?>

        </div>
    </div>
</div>
</div>