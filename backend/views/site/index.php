<?php
/**
 * @var integer $newContactsCount
 * @var integer $newInteractiveServicesCount
 */
$this->title = 'Bosh sahifa';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <h1 class="text-center"><?= Yii::$app->name ?></h1>
    <div class="row">
        <a href="<?= \yii\helpers\Url::to(['/contacts']) ?>" class="col-lg-6 border border-dark"
           style="border-radius: 15px">
            <h3 class="text-center">Aloqa</h3>
            <hr>
            <p class="text-center">
                Sizda <?= ($newContactsCount > 0) ? $newContactsCount . "ta yangi aloqa habari mavjud." : "yangi aloqa habari mavjud emas." ?></p>
        </a>
        <a href="<?= \yii\helpers\Url::to(['/interactive-services']) ?>" class="col-lg-6 border border-dark"
           style="border-radius: 15px">
            <h3 class="text-center">Interaktiv xizmatlar</h3>
            <hr>
            <p class="text-center">
                Sizda <?= ($newInteractiveServicesCount > 0) ? $newInteractiveServicesCount . "ta yangi interaktiv xizmatlar habari mavjud." : "yangi interaktiv xizmatlar habari mavjud emas." ?></p>
        </a>
    </div>
</div>