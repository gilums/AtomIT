<?php
/* @var $this AccesoriosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Accesorios',
);

$this->menu=array(
	array('label'=>'Create Accesorios', 'url'=>array('create')),
	array('label'=>'Manage Accesorios', 'url'=>array('admin')),
);
?>

<h1>Accesorios</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'accesorios-grid',
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