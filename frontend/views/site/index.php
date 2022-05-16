<?php

/**
 * @var yii\web\View $this
 * @var \common\models\Journal[] $last_published_journals
 */

$this->title = 'Bosh sahifa';
?>
<div class="site-index">
    <h1 class="text-center">So'ngi nashr qilingan jurnallar</h1>

    <?php if (empty($last_published_journals)){
        echo "<p>Hozircha jurnallar chop qilinmagan.</p>";
    } ?>

    <?php foreach ($last_published_journals as $journal) : ?>
        <div class="row mt-2">
            <div class="col-3">
                <img src="<?=$journal->getImage()->getUrl()?>" alt="Journal's image" class="img-fluid">
            </div>
            <div class="col-9" style="font-size: larger">
                <p style="font-size: larger" class="text-justify">
                    <i class="fa fa-clock"></i> <?=$journal->published ?>
                </p>
                <p class="text-justify"><a href="<?=\yii\helpers\Url::to(['journal-details/' . $journal->id])?>"><?=$journal->name?></a></p>
                <p class="text-justify"><?=$journal->description?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
