<div class="contenedor-titulo-c">
    <h1>Clientes <small>/CREAR</small></h1>
    <div class="col-md-6">
        <?php
        /* @var $this ClientesController */
        /* @var $model Clientes */
            $this->widget(
                    'booster.widgets.TbBreadcrumbs',
                    array(
                        'links' => array('Clientes' => 'index','Crear'), 
                    )
            );
        ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>