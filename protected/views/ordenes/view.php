<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */

$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	$model->id,
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
