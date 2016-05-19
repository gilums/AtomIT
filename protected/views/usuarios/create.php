<div class="contenedor-titulo-c">
    <h1>Usuarios <small>/CREAR</small></h1>
    <div class="col-md-6">
        <?php
        /* @var $this UsuariosController */
        /* @var $model Usuarios */

        $this->widget(
            'booster.widgets.TbBreadcrumbs',
            array(
                'links' => array('Usuarios' => 'index','Crear'), 
            )
        );
        ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
<!-- <div class="panel panel-default">
    <div class="panel-heading text-left">Crear Usuario</div>
    <div class="panel-body admin"> -->
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
<!--     </div>
<div>
 -->
</div>