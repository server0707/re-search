<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Editorials */

$this->title = 'Tahririyat qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Tahririyat', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="editorials-create">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
