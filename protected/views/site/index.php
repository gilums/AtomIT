<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="contenedor-cont-vistas">
    <div class="search-form">
        <?php $this->renderPartial('_search',array(
            'model'=>$model,
        )); ?>
    </div><!-- search-->
    <?php 
        $this->widget('booster.widgets.TbExtendedGridView', array(
    	'id'=>'ordenes-grid',
    	'type' => 'condensed',
    	'dataProvider'=>$model->searchb(),
        'responsiveTable' => true,
    	'template' => "{items}{pager}",
    	'filter'=>$model,
    	'columns'=>	array(
    			array('name'=>'id', 'header'=>'Nro.', 'htmlOptions'=>array('style'=>'width: 60px')),
                array(
                    'name'=>'id_equipo',
                    //'filter'=>CHtml::listData(Marcas::model()->findAll(),'id','nombre'),
                    'value'=>'$data->equipo->marcas->nombre',
                    'header'=>'Marca'
                    ),
                array('name'=>'id_equipo','value'=>'$data->equipo->modelo','header'=>'Modelo'),
    			array('name'=>'id_equipo','value'=>'$data->equipo->tipo','header'=>'Tipo'),
    			array('name'=>'fecha_ingreso','header'=>'Fecha ingreso'),
    			array('name'=>'condicion', 'header'=>'Condicion'),
    			array(
                        'name'=>'estado', 
                        'header'=>'Estado'
                     ),
    /*			array('name'=>'direccion', 'header'=>'Dirección'),*/
                array('name'=>'id_cliente','value'=>'$data->clientes->nombre','header'=>'Cliente'),
     /*           array('name'=>'fecha_cierre', 'header'=>'Fecha cierre'),
                array('name'=>'fecha_retiro', 'header'=>'Fecha retiro'),*/
    			array(
    				'htmlOptions' => array('nowrap'=>'nowrap'),
    				'class'=>'booster.widgets.TbButtonColumn',
                    'deleteConfirmation'=>'Esta seguro que desea eliminar el cliente?',
    				'viewButtonUrl'=>'Yii::app()->createUrl("ordenes/view", array("id"=>$data->id))',
    				'updateButtonUrl'=>'Yii::app()->createUrl("ordenes/update", array("id"=>$data->id))',
    				'deleteButtonUrl'=>'Yii::app()->createUrl("ordenes/delete", array("id"=>$data->id))',
    			),
    		),

    )); 

/*
'filter'      => CHtml::dropDownList( 'VwProductsList[group_title]', $model->group_title,
        CHtml::listData( ProductGroups::model()->findAll( array( 'order' => 'group_title' ) ), 'group_title', 'group_title' ),
        array( 'empty' => '-' )
    ),
 */

$this->widget('ext.ypace.YPace', array(
    'theme' => 'flat-top' 
));
?>
</div>

<script type="text/javascript">
    function lanzarPdf(){
           //alert(id);
           var url='<?php echo Yii::app()->createUrl("ordenes/pdfcreate", array('id'=>$model->id)); ?>';
           window.open(url, "_blank", "width=900,height=700"); 
           return false;
    }

$(document).ready(function() {
    
    $(".search-button").click(function(event) {
        if ($( ".search-form" ).hasClass( "activar" )) {
                $('.search-form').removeClass('activar');
            }
            else {
                $('.search-form').addClass('activar');
                
            }
    });

});

</script>

