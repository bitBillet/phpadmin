
<?php
use common\widgets\TableWidget;
/* @var $this yii\web\View */
/* @var $data string */
$this->title = 'SQL Script';
?>

<h1>История SQL-запросов</h1>

<?php
echo TableWidget::getResponse($data);
?>
