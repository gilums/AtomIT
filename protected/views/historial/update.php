<?php
/* @var $this HistorialController */
/* @var $model Historial */

$this->breadcrumbs=array(
	'Historials'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Historial', 'url'=>array('index')),
	array('label'=>'Create Historial', 'url'=>array('create')),
	array('label'=>'View Historial', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Historial', 'url'=>array('admin')),
);
?>

<h1>Update Historial <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>