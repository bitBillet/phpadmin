<?php
use yii\helpers\Html;
use common\widgets\TableWidget;
/* @var $this yii\web\View */
/* @var $data array */
$this->title = 'SQL Script';
?>

<div class='select-table'>
    <?php
    echo TableWidget::getResponse($data);
    ?>
</div>


<h1><?=$this->title?></h1>
<div class="script-form">
    <?= Html::beginForm('sql-script') ?>
    <?= Html::textarea('text') ?>
    <?= Html::submitButton('Run') ?>
    <?= Html::endForm(); ?>
</div>
