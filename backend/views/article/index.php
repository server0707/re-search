<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Article;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maqolalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

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
                'attribute' => 'theme',
                'options' => [
                    'style' => 'width: 30%'
                ]
            ],
            [
                'attribute' => 'authors',
                'format' => 'html',
                'options' => [
                    'style' => 'width: 30%'
                ]
            ],
            [
                'attribute' => 'pagesOfJournal',
                'filter' => false,
                'options' => [
                    'style' => 'width: 10%'
                ]
            ],
            [
                'attribute' => 'journal_id',
                'value' => function($model){
                    return $model->journal->name;
                },
                'filter' => \yii\helpers\ArrayHelper::map(\common\models\Journal::find()->all(),'id','name'),
                'options' => [
                    'style' => 'width: 20%'
                ]
            ],
//            'file_name',
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Article $model, $key, $index, $column) {
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
