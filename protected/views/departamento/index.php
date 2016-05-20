<div class="contenedor-titulo">
    <h1>Departamento</h1>
    <div class="col-md-6">
        <?php

        /* @var $this DepartamentoController */
        /* @var $dataProvider CActiveDataProvider */

        $this->widget(
            'booster.widgets.TbBreadcrumbs',
            array(
                'links' => array('Departamento' => 'index'), 
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
        <a href="<?php echo Yii::app()->createAbsoluteUrl('departamento/create'); ?>" class="btn btn-default btn-link-c"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <div class="panel panel-default">
        <div class="panel-heading text-left"><span class="color-txt">Administrador Departamento</span> <!--<a href="#" class="btn-link btn-sm search-button"><i class="fa fa-search"></i></a><a href="<?php #echo Yii::app()->createAbsoluteUrl('departamento/create'); ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a>--></div>

        <div class="panel-body admin">
        <?php $this->widget('booster.widgets.TbExtendedGridView', array(
        	'id'=>'departamento-grid',
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
                        'template'=>'{update} {delete}',
                        'deleteConfirmation'=>'Esta seguro que desea eliminar la ciudad?',
        				'viewButtonUrl'=>'Yii::app()->createUrl("departamento/view", array("id"=>$data->id))',
        				'updateButtonUrl'=>'Yii::app()->createUrl("departamento/update", array("id"=>$data->id))',
        				'deleteButtonUrl'=>'Yii::app()->createUrl("departamento/delete", array("id"=>$data->id))',
        			),
        		),

        )); ?>
        </div>
    <div>
<div>


