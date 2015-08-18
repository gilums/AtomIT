<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */

$this->breadcrumbs=array(
	'Departamentos'=>array('index'),
	$model->id=>array('view','id'=>$model->nombre),
	'Modificar',
);

$this->menu=array(
	array('label'=>'List Departamento', 'url'=>array('index')),
	array('label'=>'Create Departamento', 'url'=>array('create')),
	array('label'=>'View Departamento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Departamento', 'url'=>array('admin')),
);
?>

<h1>Modificar Departamento - <?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>