<?php
/* @var $this ContactosController */
/* @var $dataProvider CActiveDataProvider */

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Contactos' => 'index'), 
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
    <div class="panel-heading text-left">Administrador Contactos <a href="#" class="btn-link btn-sm search-button"><i class="fa fa-search"></i></a><a href="<?php echo Yii::app()->createAbsoluteUrl('contactos/create'); ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a></div>

<div class="panel-body admin">
<?php $this->widget('booster.widgets.TbExtendedGridView', array(
	'id'=>'contactos-grid',
	'type' => 'condensed',
	'dataProvider'=>$model->search(),
    'responsiveTable' => true,
	'template' => "{items}{pager}",
	'filter'=>$model,
	'columns'=>	array(
			array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
			array('name'=>'nombre', 'header'=>'Nombre'),
			array('name'=>'apellido', 'header'=>'Apellido'),
			array('name'=>'telefono', 'header'=>'Telefono'),
			array('name'=>'email', 'header'=>'Email'),
			array('name'=>'id_cliente','value'=>'$data->cliente->nombre', 'header'=>'Cliente'),
			array(
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
                'deleteConfirmation'=>'Esta seguro que desea eliminar el usuario?',
				'viewButtonUrl'=>'Yii::app()->createUrl("contactos/view", array("id"=>$data->id))',
				'updateButtonUrl'=>'Yii::app()->createUrl("contactos/update", array("id"=>$data->id))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("contactos/delete", array("id"=>$data->id))',
			),
		),

)); ?>
    </div>
<div>