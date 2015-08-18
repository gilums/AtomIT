<?php
/* @var $this BarrioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Barrios',
);

?>

<h1>Barrios</h1>

<?php echo CHtml::link('Crear','create',array('class'=>'btn btn-default')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'barrio-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		array(            // display 'author.username' using an expression
            'name'=>'id_ciudad',
            'value'=>'$data->ciudad->nombre',
            ),
		array(            // display 'author.username' using an expression
            'name'=>'id_departamento',
            'value'=>'$data->departamento->nombre',
            ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>