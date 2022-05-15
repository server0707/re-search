<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Keyword */

$this->title = 'Kalit so\'z qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Kalit so\'zlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keyword-create">

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
