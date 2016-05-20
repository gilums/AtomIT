<div class="contenedor-titulo-c">
    <h1>Ciudades <small>/CREAR</small></h1>
    <div class="col-md-6">
        <?php
        /* @var $this CiudadController */
        /* @var $model Ciudad */
            $this->widget(
                    'booster.widgets.TbBreadcrumbs',
                    array(
                        'links' => array('Ciudades' => 'index','Crear'), 
                    )
            );
        ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>