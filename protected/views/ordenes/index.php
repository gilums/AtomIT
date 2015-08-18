<?php
/* @var $this OrdenesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ordenes',
);

$this->menu=array(
	array('label'=>'Create Ordenes', 'url'=>array('create')),
	array('label'=>'Manage Ordenes', 'url'=>array('admin')),
);
?>

<h1>Ordenes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
