<?php
/* @var $this MarcasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Marcases',
);

$this->menu=array(
	array('label'=>'Create Marcas', 'url'=>array('create')),
	array('label'=>'Manage Marcas', 'url'=>array('admin')),
);
?>

<h1>Marcas</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'marcas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>