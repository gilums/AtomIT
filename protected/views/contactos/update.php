<div class="contenedor-titulo-c">
    <?php $ncom = $model->nombre.' '.$model->apellido ?>
    <h1>Contactos <small>/MODIFICAR/<?php echo $ncom; ?></small></h1>
    <div class="col-md-6">
        <?php
        /* @var $this ContactosController */
        /* @var $model Contactos */

            $this->widget(
                'booster.widgets.TbBreadcrumbs',
                array(
                    'links' => array('Contactos' => 'index',$ncom,'Modificar'), 
                )
            );
        ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
