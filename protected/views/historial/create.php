<?php
/* @var $this HistorialController */
/* @var $model Historial */

$this->breadcrumbs=array(
	'Historials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Historial', 'url'=>array('index')),
	array('label'=>'Manage Historial', 'url'=>array('admin')),
);
?>

<h1>Create Historial</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>