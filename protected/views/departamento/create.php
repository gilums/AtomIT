<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */

$this->breadcrumbs=array(
	'Departamento'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Departamento', 'url'=>array('index')),
	array('label'=>'Manage Departamento', 'url'=>array('admin')),
);
?>

<h1>Crear Departamento</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>