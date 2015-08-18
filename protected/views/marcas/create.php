<?php
/* @var $this MarcasController */
/* @var $model Marcas */

$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'List Marcas', 'url'=>array('index')),
	array('label'=>'Manage Marcas', 'url'=>array('admin')),
);
?>

<h1>Create Marcas</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
