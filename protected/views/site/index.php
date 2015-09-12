<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->widget('booster.widgets.TbExtendedGridView', array(
	'id'=>'ordenes-grid',
	'type' => 'condensed',
	'dataProvider'=>$model->search(),
    'responsiveTable' => true,
	'template' => "{items}{pager}",
	'filter'=>$model,
	'columns'=>	array(
			array('name'=>'id', 'header'=>'Nro.', 'htmlOptions'=>array('style'=>'width: 60px')),
            array('name'=>'id_equipo','value'=>'$data->equipo->marcas->nombre','header'=>'Marca'),
            array('name'=>'id_equipo','value'=>'$data->equipo->modelo','header'=>'Modelo'),
			array('name'=>'id_equipo','value'=>'$data->equipo->tipo','header'=>'Tipo'),
			array('name'=>'fecha_ingreso', 'header'=>'Fecha ingreso'),
			array('name'=>'condicion', 'header'=>'Condicion'),
			array('name'=>'estado', 'header'=>'Estado'),
/*			array('name'=>'direccion', 'header'=>'Dirección'),*/
/*			array('name'=>'finalizada', 'header'=>'Finalizada?'),*/
            array('name'=>'id_cliente','value'=>'$data->clientes->nombre','header'=>'Cliente'),
			array(
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
                'deleteConfirmation'=>'Esta seguro que desea eliminar el cliente?',
				'viewButtonUrl'=>'Yii::app()->createUrl("ordenes/view", array("id"=>$data->id))',
				'updateButtonUrl'=>'Yii::app()->createUrl("ordenes/update", array("id"=>$data->id))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("ordenes/delete", array("id"=>$data->id))',
			),
		),

)); ?>

