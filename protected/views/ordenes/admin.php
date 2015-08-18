<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */

$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Ordenes', 'url'=>array('index')),
	array('label'=>'Create Ordenes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ordenes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ordenes</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ordenes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_equipo',
		'fecha_ingreso',
		'fecha_cierre',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
