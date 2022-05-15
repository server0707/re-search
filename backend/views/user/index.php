<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adminlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

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
                'attribute' => 'username',
                'options' => [
                    'style' => 'width: 30%'
                ]
            ],
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            [
                'attribute' => 'email',
                'value' => function ($model) {
                    return \yii\bootstrap4\Html::a($model->email, 'mailto:' . $model->email);
                },
                'format' => 'html',
                'options' => [
                    'style' => 'width: 40%'
                ]
            ],
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return [\common\models\User::STATUS_INACTIVE => 'Nofaol', \common\models\User::STATUS_ACTIVE => 'Faol'][$model->status];
                },
                'filter' => [\common\models\User::STATUS_INACTIVE => 'Nofaol', \common\models\User::STATUS_ACTIVE => 'Faol'],
            ],
//            'role',
            //'created_at',
            //'updated_at',
            //'verification_token',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, \common\models\User $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'options' => [
                    'style' => 'width: 80px'
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
