<?php
use common\models\News;

/**
 * @var \yii\debug\models\timeline\DataProvider $newsDataProvider
 * @var News $new
 * @var yii\web\View $this
 */

$this->title = 'Yangiliklar';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-news">
    <h1 class="text-center text-uppercase"><?=$this->title?></h1>

    <?php foreach ($newsDataProvider->getModels() as $new) : ?>
        <div class="row mt-2">
            <div class="col-4">
                <img src="<?=$new->getImage()->getUrl()?>" alt="new's image" class="img-fluid">
            </div>
            <div class="col-8" style="font-size: larger">
                <p style="font-size: larger" class="text-justify">
                    <i class="fa fa-clock"></i> <?=date('Y-m-d H:i:s', $new->created_at)?>
                </p>
                <h3 class="text-justify"><a href="<?=\yii\helpers\Url::to(['news-detail', 'id' => $new->id])?>"><?=$new->title?></a></h3>
                <p class="text-justify"><?=$new->description?></p>
            </div>
        </div>
    <?php endforeach; ?>
    <?php
    echo \yii\bootstrap4\LinkPager::widget([
        'pagination' => $newsDataProvider->pagination,
        'options' => [
                'class' => 'float-right'
        ]
    ]);
    ?>
</div>
