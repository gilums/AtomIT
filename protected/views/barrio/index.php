<?php

/* @var $this BarrioController */
/* @var $dataProvider CActiveDataProvider */

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Barrio' => 'index'), 
    )
);


Yii::app()->clientScript->registerScript('search', "$('.filters').toggle().hide();
$('.search-button').click(function(){
	$('.filters').toggle();
	return false;
});
");
?>


<div class="panel panel-default">
    <div class="panel-heading text-left">Administrador Barrio <a href="#" class="btn-link btn-sm search-button"><i class="fa fa-search"></i></a><a href="<?php echo Yii::app()->createAbsoluteUrl('barrio/create'); ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a></div>

<div class="panel-body admin">
<?php $this->widget('booster.widgets.TbExtendedGridView', array(
	'id'=>'barrio-grid',
	'type' => 'condensed',
	'dataProvider'=>$model->search(),
    'responsiveTable' => true,
	'template' => "{items}{pager}",
	'filter'=>$model,
	'columns'=>	array(
			array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
			array('name'=>'nombre', 'header'=>'Nombre'),
			array('name'=>'id_ciudad','value'=>'$data->ciudad->nombre', 'header'=>'Cuidad'),
			array('name'=>'id_departamento','value'=>'$data->departamento->nombre', 'header'=>'Departamento'),
			array(
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
                'deleteConfirmation'=>'Esta seguro que desea eliminar la ciudad?',
				'viewButtonUrl'=>'Yii::app()->createUrl("barrio/view", array("id"=>$data->id))',
				'updateButtonUrl'=>'Yii::app()->createUrl("barrio/update", array("id"=>$data->id))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("barrio/delete", array("id"=>$data->id))',
			),
		),

)); ?>
    </div>
<div>