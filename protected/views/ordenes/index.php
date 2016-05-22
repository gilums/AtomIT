<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Ordenes' => 'index'), 
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
    <div class="panel-heading text-left">Administrador Ordenes <a href="#" class="btn-link btn-sm search-button"><i class="fa fa-search"></i></a><a href="<?php echo Yii::app()->createAbsoluteUrl('ordenes/create'); ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a></div>

    <div class="panel-body admin">

<?php $this->widget('booster.widgets.TbExtendedGridView', array(
	'id'=>'ordenes-grid',
	'type' => 'condensed',
	'dataProvider'=>$model->search(),
    'responsiveTable' => true,
	'template' => "{items}{pager}",
	'filter'=>$model,
	'columns'=>	array(
			array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
            /*array('name'=>'id_equipo','value'=>'$data->equipo->marcas->nombre','header'=>'Equipo Marca'),*/
			array('name'=>'id_equipo','value'=>'$data->equipo->modelo','header'=>'Equipo'),
			array('name'=>'fecha_ingreso', 'header'=>'Fecha ingreso'),
			array('name'=>'estado', 'header'=>'Estado'),
/*			array('name'=>'direccion', 'header'=>'Dirección'),*/
			array('name'=>'finalizada', 'header'=>'Finalizada?'),
            array('name'=>'id_cliente','value'=>'$data->clientes->nombre','header'=>'Cliente'),
			array(
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
                'template'=>'{print} {update} {delete}',
                'deleteConfirmation'=>'Esta seguro que desea eliminar el cliente?',
                'buttons'=>array(           
                    'print' => array
                        (
                            'label'=>'<i class="glyphicon glyphicon-print"></i>',                    
                            'url'=>'Yii::app()->createUrl("ordenes/pdfcreate", array("id"=>$data->id))',
                            'options'=>array(
                                'target'=>'_black',
                                'title'=>'Imprimir Orden',
                            ),
                        ),

                ),
				//'viewButtonUrl'=>'Yii::app()->createUrl("ordenes/view", array("id"=>$data->id))',
				'updateButtonUrl'=>'Yii::app()->createUrl("ordenes/update", array("id"=>$data->id))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("ordenes/delete", array("id"=>$data->id))',
			),
		),

)); ?>
    </div>
<div>