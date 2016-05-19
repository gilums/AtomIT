<div class="contenedor-titulo-c">
    <h1>Usuarios <small>/MODIFICAR/<?php echo $model->nick; ?></small></h1>
    <div class="col-md-6">
        <?php
        /* @var $this UsuariosController */
        /* @var $model Usuarios */

        $this->widget(
            'booster.widgets.TbBreadcrumbs',
            array(
                'links' => array('Usuarios' => 'index',$model->nick,'Modificar'), 
            )
        );
        ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>