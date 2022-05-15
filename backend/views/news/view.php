<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Yangiliklar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">

    <!--    <h1>--><? //= Html::encode($this->title) ?><!--</h1>-->

    <p>
        <?= Html::a('Tahrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'title',
            'description',
            [
                'attribute' => 'status',
                'value' => ($model->status === \common\models\News::STATUS_ACTIVE) ? "Faol" : "Nofaol",
            ],
            'keywords',
            [
                'attribute' => 'image',
                'value' => Html::img($model->getImage()->getUrl(), ['class' => 'img-fluid', 'alt' => 'News image']),
                'format' => 'html'
            ],
            'content:html',
//            'updated_at',
//            'created_at',
        ],
    ]) ?>

    <div class="container">
        <h3 class="text-center">Galereya</h3>
        <div class="row">
            <?php foreach ($model->getImages() as $image) : ?>
                <div class="col-4">
                    <img src="<?= $image->getUrl() ?>" alt="News gallery" class="img-fluid">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>
