<?php
/* @var $this UsuariosController */
/* @var $dataProvider CActiveDataProvider */

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Historial' => 'index'), 
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
    <div class="panel-heading text-left">Historial <a href="#" class="btn-link btn-sm search-button"><i class="fa fa-search"></i></a></div>

<div class="panel-body admin">
<?php $this->widget('booster.widgets.TbExtendedGridView', array(
	'id'=>'historial-grid',
	'type' => 'condensed',
	'dataProvider'=>$model->search(),
    'responsiveTable' => true,
    'fixedHeader'=> true,
	'template' => "{items}{pager}",
	'filter'=>$model,
	'columns'=>	array(
			/*array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),*/
			array('name'=>'id_usuario','value'=>'$data->usuario->nick', 'header'=>'Usuario'),
			array('name'=>'tipo', 'header'=>'Tipo'),
			array('name'=>'estilo', 'header'=>'Estilo'),
			/*array('name'=>'descripcion', 'header'=>'Descripcion'),*/
			array('class' => 'booster.widgets.TbToggleColumn','name'=>'visto', 'header'=>'Visto','htmlOptions'=>array('style'=>'width: 30px')),
            array('name'=>'fecha_creacion', 'header'=>'Fecha creacion'),
			array(
				'htmlOptions' => array('nowrap'=>'nowrap'),
                'template' => '{view} {delete}',
				'class'=>'booster.widgets.TbButtonColumn',
                'deleteConfirmation'=>'Esta seguro que desea eliminar el registro?',
				'viewButtonUrl'=>'Yii::app()->createUrl("historial/view", array("id"=>$data->id))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("historial/delete", array("id"=>$data->id))',
			),
		),

)); ?>
    </div>
<div>