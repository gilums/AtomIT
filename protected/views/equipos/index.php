<div class="contenedor-titulo">
    <h1>Equipos</h1>
    <div class="col-md-6">
        <?php

        /* @var $this EquiposController */
        /* @var $dataProvider CActiveDataProvider */

        $this->widget(
            'booster.widgets.TbBreadcrumbs',
            array(
                'links' => array('Equipos' => 'index'), 
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
    </div>
</div>
<div class="contenedor-cont-vistas">
    <div class="panel panel-default">
        <div class="panel-heading text-left"><span class="color-txt">Administrador Equipos</span> <!--<a href="#" class="btn-link btn-sm search-button"><i class="fa fa-search"></i></a>--></div>

    <div class="panel-body admin">
    <?php $this->widget('booster.widgets.TbExtendedGridView', array(
    	'id'=>'equipos-grid',
    	'type' => 'condensed',
    	'dataProvider'=>$model->search(),
        'responsiveTable' => true,
    	'template' => "{items}{pager}",
    	'filter'=>$model,
    	'columns'=>	array(
    			array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
    			array('name'=>'modelo', 'header'=>'Modelo'),
    			array('name'=>'nro_serie', 'header'=>'Nro. Serie'),
    			array('name'=>'tipo', 'header'=>'Tipo'),
    			array('name'=>'id_marca','value'=>'$data->marcas->nombre','header'=>'Marca'),
    			array(
    				'htmlOptions' => array('nowrap'=>'nowrap'),
    				'class'=>'booster.widgets.TbButtonColumn',
                    'deleteConfirmation'=>'Esta seguro que desea eliminar la ciudad?',
    				'viewButtonUrl'=>'Yii::app()->createUrl("equipos/view", array("id"=>$data->id))',
    				'updateButtonUrl'=>'Yii::app()->createUrl("equipos/update", array("id"=>$data->id))',
    				'deleteButtonUrl'=>'Yii::app()->createUrl("equipos/delete", array("id"=>$data->id))',
    			),
    		),

    )); ?>
         </div>
    <div>
<div>
