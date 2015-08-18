<?php
/* @var $this CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs=array(
	'Ciudades'=>array('index'),
	$model->id=>array('view','id'=>$model->nombre),
	'Modificar',
);

$this->menu=array(
	array('label'=>'List Ciudad', 'url'=>array('index')),
	array('label'=>'Create Ciudad', 'url'=>array('create')),
	array('label'=>'View Ciudad', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ciudad', 'url'=>array('admin')),
);
?>


<h1>Modificar Ciudad - <?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>