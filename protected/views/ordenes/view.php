<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */

$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ordenes', 'url'=>array('index')),
	array('label'=>'Create Ordenes', 'url'=>array('create')),
	array('label'=>'Update Ordenes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ordenes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ordenes', 'url'=>array('admin')),
);
?>

<h1>View Ordenes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_equipo',
		'fecha_ingreso',
		'fecha_cierre',
		'fecha_retiro',
		'falla',
		'diagnostico',
		'solucion',
		'nota',
		'condicion',
		'estado',
		'transporte',
		'finalizada',
		'id_cliente',
	),
)); ?>
