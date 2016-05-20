<?php
/* @var $this ParametrosController */
/* @var $model Parametros */

$this->breadcrumbs=array(
	'Parametroses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Parametros', 'url'=>array('index')),
	array('label'=>'Create Parametros', 'url'=>array('create')),
	array('label'=>'Update Parametros', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Parametros', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Parametros', 'url'=>array('admin')),
);
?>

<h1>View Parametros #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipo',
		'nombre',
		'descripcion',
		'valor',
		'estado',
		'fecha_creacion',
	),
)); ?>
