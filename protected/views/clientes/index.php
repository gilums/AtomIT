<div class="contenedor-titulo">
    <h1>Clientes</h1>
    <div class="col-md-6">
        <?php
        /* @var $this ClientesController */
        /* @var $model Clientes */

        $this->widget(
            'booster.widgets.TbBreadcrumbs',
            array(
                'links' => array('Clientes' => 'index'), 
            )
        );



        Yii::app()->clientScript->registerScript('search', "$('.filters').toggle().hide();
        $('.search-button').click(function(){
        	$('.filters').toggle();
        	return false;
        });
        ");
        ?>
    </div>
    <div class="text-right">
        <a href="#" class="btn btn-default btn-link-c search-button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a>
        <a href="<?php echo Yii::app()->createAbsoluteUrl('clientes/create'); ?>" class="btn btn-default btn-link-c"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
        <a href="<?php echo Yii::app()->createAbsoluteUrl('contactos/create');?>" class="btn btn-default btn-link-c"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
        <!--<a href="#" class="btn-link-c "><i class="fa fa-search fa-lg"></i></a>-->
        <!--<a href="<?php #echo Yii::app()->createAbsoluteUrl('clientes/create'); ?>" class="btn-link-c"><i class="fa fa-plus"></i></a>-->
    </div>
</div>
<div class="contenedor-cont-vistas">
    <div class="panel panel-default">
        <div class="panel-heading text-left"><span class="color-txt">Administrador Clientes</span> <!--<a href="#" class="btn-link btn-sm search-button"><i class="fa fa-search"></i></a><a href="<?php #echo Yii::app()->createAbsoluteUrl('clientes/create'); ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a>--></div>

        <div class="panel-body admin">

    <?php $this->widget('booster.widgets.TbExtendedGridView', array(
    	'id'=>'clientes-grid',
    	'type' => 'condensed',
    	'dataProvider'=>$model->search(),
        'responsiveTable' => true,
    	'template' => "{items}{pager}",
    	'filter'=>$model,
    	'columns'=>	array(
    			array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
    			array('name'=>'nombre', 'header'=>'Nombre'),
    			array('name'=>'rut', 'header'=>'Rut'),
    			array('name'=>'razon_social', 'header'=>'Razón Social'),
    /*			array('name'=>'direccion', 'header'=>'Dirección'),*/
    			array('name'=>'email', 'header'=>'E-Mail'),
                // array('name'=>'fecha_creacion', 'header'=>'Fecha creacion'),
    			array(
    				'htmlOptions' => array('nowrap'=>'nowrap'),
    				'class'=>'booster.widgets.TbButtonColumn',
                    'deleteConfirmation'=>'Esta seguro que desea eliminar el cliente?',
    				'viewButtonUrl'=>'Yii::app()->createUrl("clientes/view", array("id"=>$data->id))',
    				'updateButtonUrl'=>'Yii::app()->createUrl("clientes/update", array("id"=>$data->id))',
    				'deleteButtonUrl'=>'Yii::app()->createUrl("clientes/delete", array("id"=>$data->id))',
    			),
    		),

    )); ?>
        </div>
    <div>
<div>