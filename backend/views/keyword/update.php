<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Keyword */

$this->title = 'Kalit so\'zni tahrirlash: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Kalit so\'zlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>
<div class="keyword-update">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
