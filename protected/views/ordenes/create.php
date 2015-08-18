<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */

$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ordenes', 'url'=>array('index')),
	array('label'=>'Manage Ordenes', 'url'=>array('admin')),
);
?>

<h1>Crear Orden</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'equipo'=>$equipo)); ?>