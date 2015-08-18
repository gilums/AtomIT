<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */

$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ordenes', 'url'=>array('index')),
	array('label'=>'Create Ordenes', 'url'=>array('create')),
	array('label'=>'View Ordenes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ordenes', 'url'=>array('admin')),
);
?>

<h1>Update Ordenes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>