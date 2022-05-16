<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Journal */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Jurnallar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="journal-view">

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
            'name',
            'pages_count',
            'published',
            'file_name',
            'description:html',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
