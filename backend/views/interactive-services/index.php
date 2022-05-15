<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\InteractiveServices;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\InteractiveServicesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Interaktiv xizmatlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interactive-services-index">

    <!--    <h1>--><? //= Html::encode($this->title) ?><!--</h1>-->

    <!--    --><?php //Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-hover'
        ],
        'rowOptions' => function ($model) {
            if (!$model->viewed) {
                return ['class' => 'bg-warning'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'fullName',
                'options' => [
                    'style' => 'width: 30%'
                ]
            ],
            [
                'attribute' => 'type',
                'filter' => ['Maqola uchun UDK raqam olish' => 'Maqola uchun UDK raqam olish', 'Disertatsiya uchun UDK olish' => 'Disertatsiya uchun UDK olish', 'Antiplagiatda tekshirish' => 'Antiplagiatda tekshirish'],
                'options' => [
                    'style' => 'width: 30%'
                ]
            ],
            [
                'attribute' => 'file_name',
                'value' => function ($model) {
                    return \yii\bootstrap4\Html::a($model->file_name, ['../../uploads/services/' . $model->file_name]);
                },
                'format' => 'html',
                'options' => [
                    'style' => 'width: 30%'
                ]
            ],
            [
                'attribute' => 'phone',
                'options' => [
                    'style' => 'width: 120px'
                ]
            ],
            [
                'attribute' => 'created_at',
                'value' => function($model){
                    return date('Y-m-d H:i:s', $model->created_at);
                },
                'filter' => false,
                'options' => [
                    'style' => 'width: 10%'
                ]
            ],
            //'updated_at',
            [
                'class' => ActionColumn::class,
                'template' => '{check} {delete}',
                'buttons' => [
                    'check' => function ($url, $model, $key) {
                        return \yii\bootstrap4\Html::a(($model->viewed == 0) ? "<i class='fa fa-check'></i>" : "<i class='fa fa-check-double'></i>", ['check', 'id' => $model->id]);
                    }
                ],
                'options' => [
                    'style' => 'width: 40px'
                ]
            ],
        ],
    ]); ?>

    <!--    --><?php //Pjax::end(); ?>

</div>
