<div class="contenedor-titulo-c">
    <h1>Barrios <small>/CREAR</small></h1>
    <div class="col-md-6">
        <?php
        /* @var $this BarrioController */
        /* @var $model Barrio */
            $this->widget(
                    'booster.widgets.TbBreadcrumbs',
                    array(
                        'links' => array('Barrios' => 'index','Crear'), 
                    )
            );
        
        ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>