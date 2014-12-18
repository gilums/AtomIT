<?php
/* @var $this AccesoriosController */
/* @var $model Accesorios */

$this->breadcrumbs=array(
	'Accesorioses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Accesorios', 'url'=>array('index')),
	array('label'=>'Create Accesorios', 'url'=>array('create')),
	array('label'=>'View Accesorios', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Accesorios', 'url'=>array('admin')),
);
?>

<h1>Update Accesorios <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>