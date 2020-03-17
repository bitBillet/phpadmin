<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model string */
$this->title = 'SQL Script';
?>

<h1><?=$this->title?></h1>
<div class="script-form">
    <?= Html::beginForm('sql-script') ?>
    <?= Html::textarea('text') ?>
    <?= Html::submitButton('Run') ?>
    <?= Html::endForm(); ?>
</div>
<div class='select-table'>
    <?= $model; ?>
</div>