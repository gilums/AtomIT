<?php
/* @var $this BarrioController */
/* @var $model Barrio */

$this->breadcrumbs=array(
	'Barrios'=>array('index'),
	$model->id=>array('view','id'=>$model->nombre),
	'Modificar',
);

$this->menu=array(
	array('label'=>'List Barrio', 'url'=>array('index')),
	array('label'=>'Create Barrio', 'url'=>array('create')),
	array('label'=>'View Barrio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Barrio', 'url'=>array('admin')),
);
?>

<h1>Modificar Barrio - <?php echo $model->nombre; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>