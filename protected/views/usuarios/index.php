<?php
/* @var $this UsuariosController */
/* @var $dataProvider CActiveDataProvider */

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Usuarios' => 'index'), 
    )
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.filters').toggle();
	return false;
});
");
?>



<div class="panel panel-default">
    <div class="panel-heading text-left">Administrador Usuarios <a href="#" class="btn-link btn-sm search-button"><i class="fa fa-search"></i></a><a href="<?php echo Yii::app()->createAbsoluteUrl('usuarios/create'); ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a><a href="<?php echo Yii::app()->createAbsoluteUrl('usuarios/crearPdf'); ?>" class="btn-link btn-sm">PDF</a></div>

<div class="panel-body admin">
<?php $this->widget('booster.widgets.TbExtendedGridView', array(
	'id'=>'usuarios-grid',
	'type' => 'condensed',
	'dataProvider'=>$model->search(),
    'responsiveTable' => true,
	'template' => "{items}{pager}",
	'filter'=>$model,
	'columns'=>	array(
			array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
			array('name'=>'nick', 'header'=>'Nick'),
			array('name'=>'pass', 'header'=>'Password'),
            array('name'=>'fecha_creacion', 'header'=>'Fecha creacion'),
			array(
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
                'deleteConfirmation'=>'Esta seguro que desea eliminar el usuario?',
				'viewButtonUrl'=>'Yii::app()->createUrl("usuarios/view", array("id"=>$data->id))',
				'updateButtonUrl'=>'Yii::app()->createUrl("usuarios/update", array("id"=>$data->id))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("usuarios/delete", array("id"=>$data->id))',
			),
		),

)); ?>
    </div>
<div>
