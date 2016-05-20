<div class="contenedor-titulo">
    <h1>Ciudad</h1>
    <div class="col-md-6">
        <?php

        /* @var $this CiudadController */
        /* @var $dataProvider CActiveDataProvider */

        $this->widget(
            'booster.widgets.TbBreadcrumbs',
            array(
                'links' => array('Ciudad' => 'index'), 
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
        <a href="<?php echo Yii::app()->createAbsoluteUrl('ciudad/create'); ?>" class="btn btn-default btn-link-c"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
    </div>
</div>

<div class="contenedor-cont-vistas">
    <div class="panel panel-default">
        <div class="panel-heading text-left"><span class="color-txt">Administrador Ciudad</span> <!--<a href="#" class="btn-link btn-sm search-button"><i class="fa fa-search"></i></a><a href="<?php #echo Yii::app()->createAbsoluteUrl('ciudad/create'); ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a>--></div>

    <div class="panel-body admin">
    <?php $this->widget('booster.widgets.TbExtendedGridView', array(
    	'id'=>'ciudad-grid',
    	'type' => 'condensed',
    	'dataProvider'=>$model->search(),
        'responsiveTable' => true,
    	'template' => "{items}{pager}",
    	'filter'=>$model,
    	'columns'=>	array(
    			array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
    			array('name'=>'nombre', 'header'=>'Nombre'),
    			array('name'=>'id_departamento','value'=>'$data->departamento->nombre', 'header'=>'Departamento'),
    			array(
    				'htmlOptions' => array('nowrap'=>'nowrap'),
    				'class'=>'booster.widgets.TbButtonColumn',
                    'template'=>'{update} {delete}',
                    'deleteConfirmation'=>'Esta seguro que desea eliminar la ciudad?',
    				'viewButtonUrl'=>'Yii::app()->createUrl("ciudad/view", array("id"=>$data->id))',
    				'updateButtonUrl'=>'Yii::app()->createUrl("ciudad/update", array("id"=>$data->id))',
    				'deleteButtonUrl'=>'Yii::app()->createUrl("ciudad/delete", array("id"=>$data->id))',
    			),
    		),

    )); ?>
        </div>
    <div>
<div>
