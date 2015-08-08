<?php
/* @var $this ClientesController */
/* @var $model Clientes */

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Clientes' => 'index','Admin'), 
    )
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#clientes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="panel panel-default">
    <div class="panel-heading text-left">Administrador Clientes <a href="#" class="btn-link btn-sm search-button"><i class="fa fa-search"></i></a><a href="<?php echo Yii::app()->createAbsoluteUrl('usuarios/create'); ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a></div>

    <div class="panel-body admin">

<?php #echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbExtendedGridView', array(
	'id'=>'clientes-grid',
	'type' => 'condensed',
	'dataProvider'=>$model->search(),
    'responsiveTable' => true,
	'template' => "{items}{pager}",
	#'filter'=>$model,
	'columns'=>	array(
			array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
			array('name'=>'nombre', 'header'=>'Nombre'),
			array('name'=>'rut', 'header'=>'Rut'),
			array('name'=>'razon_social', 'header'=>'Razón Social'),
			array('name'=>'direccion', 'header'=>'Dirección'),
			array('name'=>'email', 'header'=>'E-Mail'),
            array('name'=>'fecha_creacion', 'header'=>'Fecha creacion'),
			array(
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
                'deleteConfirmation'=>'Esta seguro que desea eliminar el usuario?',
				'viewButtonUrl'=>'Yii::app()->createUrl("clientes/view", array("id"=>$data->id))',
				'updateButtonUrl'=>'Yii::app()->createUrl("clientes/update", array("id"=>$data->id))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("clientes/delete", array("id"=>$data->id))',
			),
		),

)); ?>
    </div>
<div>
