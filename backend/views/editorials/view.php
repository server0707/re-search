<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Editorials */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tahririyat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="editorials-view">

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
            'fullName',
            'description',
            'email',
            'phone',
            'view_number',
            'created_at:datetime',
            'updated_at:datetime',
            [
                'attribute' => 'image',
                'value' => Html::img($model->getImage()->getUrl(), ['class' => 'img-fluid']),
                'format' => 'html'
            ]
        ],
    ]) ?>

</div>
