<?php

/* @var $this AccesoriosController */
/* @var $dataProvider CActiveDataProvider */

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Accesorios' => 'index'), 
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
    <div class="panel-heading text-left">Administrador Accesorios <a href="#" class="btn-link btn-sm search-button"><i class="fa fa-search"></i></a><a href="<?php echo Yii::app()->createAbsoluteUrl('accesorios/create'); ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a></div>

<div class="panel-body admin">
<?php $this->widget('booster.widgets.TbExtendedGridView', array(
	'id'=>'accesorios-grid',
	'type' => 'condensed',
	'dataProvider'=>$model->search(),
    'responsiveTable' => true,
	'template' => "{items}{pager}",
	'filter'=>$model,
	'columns'=>	array(
			array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
			array('name'=>'nombre', 'header'=>'Nombre'),
			array(
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
                'deleteConfirmation'=>'Esta seguro que desea eliminar la ciudad?',
				'viewButtonUrl'=>'Yii::app()->createUrl("accesorios/view", array("id"=>$data->id))',
				'updateButtonUrl'=>'Yii::app()->createUrl("accesorios/update", array("id"=>$data->id))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("accesorios/delete", array("id"=>$data->id))',
			),
		),

)); ?>
    </div>
<div>