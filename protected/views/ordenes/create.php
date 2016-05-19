<div class="contenedor-titulo-c">
    <h1>Ordenes <small>/CREAR</small></h1>
    <div class="col-md-6">
        <?php
        /* @var $this OrdenesController */
        /* @var $model Ordenes */

            $this->widget(
                'booster.widgets.TbBreadcrumbs',
                array(
                    'links' => array('Ordenes' => 'index','Crear'), 
                )
            );

        ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <?php $this->renderPartial('_form', array('model'=>$model,'equipo'=>$equipo)); ?>
</div>