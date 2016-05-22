<div class="contenedor-titulo-c">
    <h1>Equipos <small>/MODIFICAR/<?php echo $model->nro_serie; ?></small></h1>
    <div class="col-md-6">
        <?php
        /* @var $this ClientesController */
        /* @var $model Clientes */
            $this->widget(
                'booster.widgets.TbBreadcrumbs',
                array(
                    'links' => array('Equipos' => 'index',$model->nro_serie,'Modificar'), 
                )
            );
        ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>