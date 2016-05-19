<div class="contenedor-titulo">
    <h1>Usuarios</h1>
    <div class="col-md-6">
        <?php
        /* @var $this UsuariosController */
        /* @var $dataProvider CActiveDataProvider */

        $this->widget(
            'booster.widgets.TbBreadcrumbs',
            array(
                'links' => array('Usuarios' => 'index'), 
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
        <a href="<?php echo Yii::app()->createAbsoluteUrl('usuarios/create'); ?>" class="btn btn-default btn-link-c"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
        <a href="<?php echo Yii::app()->createAbsoluteUrl('usuarios/crearPdf'); ?>" target="_blank" class="btn btn-default btn-link-d">PDF</a></div>
    </div>
</div>

<div class="contenedor-cont-vistas">
    <div class="panel panel-default">
        <div class="panel-heading text-left"><span class="color-txt">Administrador Usuarios</span></div>
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
            				'viewButtonUrl'=>'Yii::app()->createUrl("usuarios/asignarrole", array("id"=>$data->id))',
            				'updateButtonUrl'=>'Yii::app()->createUrl("usuarios/update", array("id"=>$data->id))',
            				'deleteButtonUrl'=>'Yii::app()->createUrl("usuarios/delete", array("id"=>$data->id))',
            			),
            		),

            )); ?>
        </div>
    </div>
</div>
