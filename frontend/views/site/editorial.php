<?php
use common\models\Editorials;

/**
 * @var Editorials[] $editorials
 * @var Editorials $editorial
 * @var yii\web\View $this
 */

$this->title = 'Tahririyat';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-editorial">
    <h1 class="text-center text-uppercase"><?=$this->title?></h1>

    <?php foreach ($editorials as $editorial) : ?>
    <div class="row">
        <div class="col-4">
            <img src="<?=$editorial->getImage()->getUrl()?>" alt="Editorial's image" class="img-fluid">
        </div>
        <div class="col-8" style="font-size: larger">
            <h3 class="text-center"><?=$editorial->title?></h3>
            <p><i class="fa fa-user"></i> <?=$editorial->fullName?></p>
            <p><i class="fa fa-building-columns"></i> <?=$editorial->description?></p>
            <p><i class="fa fa-at"></i> <a href="mailto:<?=$editorial->email?>"><?=$editorial->email?></a></p>
            <p><i class="fa fa-phone"></i> <a href="tel:<?=$editorial->phone?>"><?=$editorial->phone?></a></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>
