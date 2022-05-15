<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Journal;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\JournalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jurnallar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="journal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('+', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'label' => 'Rasm',
                'value' => function ($model) {
                    return Html::img($model->getImage()->getUrl(), ['class' => 'img-fluid']);
                },
                'format' => 'html',
                'options' => [
                    'style' => 'width: 30%'
                ]
            ],
            [
                'attribute' => 'name',
                'options' => [
                    'style' => 'width: 40%'
                ]
            ],
            [
                'attribute' => 'pages_count',
                'filter' => false,
                'options' => [
                    'style' => 'width: 10%'
                ]
            ],
            [
                'attribute' => 'published',
                'options' => [
                    'style' => 'width: 10%'
                ]
            ],
//            'file_name',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Journal $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'options' =>[
                    'style' => 'width: 40px'
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
