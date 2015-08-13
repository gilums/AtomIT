<?php
/* @var $this HistorialController */
/* @var $model Historial */

$this->breadcrumbs=array(
	'Historials'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Historial', 'url'=>array('index')),
	array('label'=>'Create Historial', 'url'=>array('create')),
	array('label'=>'Update Historial', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Historial', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Historial', 'url'=>array('admin')),
);
?>

<h1>View Historial #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_usuario',
		'tipo',
		'estilo',
		'descripcion',
		'visto',
		'fecha_creacion',
	),
)); ?>
