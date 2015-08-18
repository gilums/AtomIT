<?php
/* @var $this CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs=array(
<<<<<<< HEAD
	'Ciudads'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
=======
	'Ciudades'=>array('index'),
	$model->id=>array('view','id'=>$model->nombre),
	'Modificar',
>>>>>>> origin/master
);

$this->menu=array(
	array('label'=>'List Ciudad', 'url'=>array('index')),
	array('label'=>'Create Ciudad', 'url'=>array('create')),
	array('label'=>'View Ciudad', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ciudad', 'url'=>array('admin')),
);
?>

<<<<<<< HEAD
<h1>Update Ciudad <?php echo $model->id; ?></h1>
=======
<h1>Modificar Ciudad - <?php echo $model->nombre; ?></h1>
>>>>>>> origin/master

<?php $this->renderPartial('_form', array('model'=>$model)); ?>