<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Editorials */

$this->title = 'Tahririyatni tahrirlash: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tahririyat', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>
<div class="editorials-update">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
