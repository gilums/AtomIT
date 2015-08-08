<?php
/* @var $this CiudadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cuidades',
);


?>

<h1>Ciudades</h1>

<?php echo CHtml::link('Crear','create',array('class'=>'btn btn-default')); ?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ciudad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		array(            // display 'author.username' using an expression
            'name'=>'id_departamento',
            'value'=>'$data->departamento->nombre',
            ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>