<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\News;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yangiliklar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <!--    <h1>--><? //= Html::encode($this->title) ?><!--</h1>-->

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
                'attribute' => 'title',
                'options' => [
                    'style' => 'width: 40%'
                ]
            ],
            [
                'attribute' => 'description',
                'options' => [
                    'style' => 'width: 40%'
                ]
            ],
            [
                'attribute' => 'status',
                'filter' => [News::STATUS_ACTIVE => 'Faol', News::STATUS_INACTIVE => 'Nofaol'],
                'value' => function($model){
                    return ($model->status === News::STATUS_ACTIVE) ? "Faol": "Nofaol";
                },
                'options' => [
                    'style' => 'width: 10%'
                ]
            ],
//            'content:ntext',
            //'keywords',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, News $model, $key, $index, $column) {
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
