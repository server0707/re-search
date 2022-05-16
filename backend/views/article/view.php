<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = $model->theme;
$this->params['breadcrumbs'][] = ['label' => 'Maqolalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

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
            'theme',
            'authors:html',
            'pagesOfJournal',
            [
                'attribute' => 'file_name',
                'value' => \yii\bootstrap4\Html::a($model->file_name, ['../../articles/' . $model->file_name]),
                'format' => 'html',
            ],
            [
                'attribute' => 'journal_id',
                'value' => $model->journal->name
            ],
//            'created_at',
//            'updated_at',
        ],
    ]) ?>

</div>
