<div class="contenedor-titulo-c">
    <h1>Departamentos <small>/MODIFICAR/<?php echo $model->nombre; ?></small></h1>
    <div class="col-md-6">
        <?php
        /* @var $this DepartamentoController */
        /* @var $model Departamento */

        $this->widget(
            'booster.widgets.TbBreadcrumbs',
            array(
                'links' => array('Departamentos' => 'index',$model->nombre,'Modificar'), 
            )
        );
        ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
