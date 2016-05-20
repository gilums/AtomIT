<div class="contenedor-titulo-c">
    <h1>Marcas <small>/MODIFICAR/<?php echo $model->nombre; ?></small></h1>
    <div class="col-md-6">
        <?php
        /* @var $this ClientesController */
        /* @var $model Clientes */
            $this->widget(
                'booster.widgets.TbBreadcrumbs',
                array(
                    'links' => array('Marcas' => 'index',$model->nombre,'Modificar'), 
                )
            );
        ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
