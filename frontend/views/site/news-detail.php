<?php
/**
 * @var \common\models\News $new
 */

$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-news-detail">
    <h1 class="text-center text-uppercase"><?=$this->title?></h1>
    <p style="font-size: larger" class="text-justify">
        <i class="fa fa-clock"></i> <?=date('Y-m-d H:i:s', $new->created_at)?>
    </p>
    <p style="font-size: larger" class="text-justify">
        <?=$new->description?>
    </p>
    <p class="text-center"><img src="<?=$new->getImage()->getUrl()?>" alt="New's Image" class="img-fluid"></p>
    <p style="font-size: larger" class="text-justify">
        <?=$new->content?>
    </p>
</div>
