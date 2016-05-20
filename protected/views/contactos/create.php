<div class="contenedor-titulo-c">
    <h1>Contactos <small>/CREAR</small></h1>
    <div class="col-md-6">
        <?php
        /* @var $this ContactosController */
        /* @var $model Contactos */

            $this->widget(
                    'booster.widgets.TbBreadcrumbs',
                    array(
                        'links' => array('Contactos' => 'index','Crear'), 
                    )
            );
        ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>