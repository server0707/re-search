<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\Editorials;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\EditorialsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tahririyat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="editorials-index">

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
                'attribute' => 'image',
                'value' => function($model){
                    return Html::img($model->getImage()->getUrl(), ['class' => 'img-fluid']);
                },
                'format' => 'html',
                'options' => [
                    'style' => 'width: 20%'
                ]
            ],
            [
                'attribute' => 'title',
                'options' => [
                    'style' => 'width: 20%'
                ]
            ],
            [
                'attribute' => 'fullName',
                'options' => [
                    'style' => 'width: 45%'
                ]
            ],
//            [
//                'attribute' => 'description',
//                'options' => [
//                    'style' => 'width: 35%'
//                ]
//            ],
//            'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Editorials $model, $key, $index, $column) {
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
