<div class="contenedor-titulo-c">
    <h1>Usuarios <small>/CREAR ROL</small></h1>
    <div class="col-md-6">
        <?php
        /* @var $this UsuariosController */
        /* @var $model Usuarios */

        $this->widget(
            'booster.widgets.TbBreadcrumbs',
            array(
                'links' => array('Usuarios' => 'index','Rol'=>'auth','Crear'), 
            )
        );

        ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <?php $this->renderPartial('_roles', array('role'=>$role)); ?>
</div>