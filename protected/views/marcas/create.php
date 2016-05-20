<div class="contenedor-titulo-c">
    <h1>Marcas <small>/CREAR</small></h1>
    <div class="col-md-6">
        <?php
        /* @var $this MarcasController */
        /* @var $model Marcas */

        $this->widget(
            'booster.widgets.TbBreadcrumbs',
            array(
                'links' => array('Marcas' => 'index','Crear'), 
            )
        );
        ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
