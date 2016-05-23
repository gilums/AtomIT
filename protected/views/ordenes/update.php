<div class="contenedor-titulo-c">
    <h1>Ordenes <small>/MODIFICAR/Orden <?php echo $model->id; ?></small></h1>
    <div class="col-md-6">
        <?php $this->widget(
            'booster.widgets.TbBreadcrumbs',
            array(
                'links' => array('Ordenes' => 'index',$model->id,'Modificar'), 
            )
        ); ?>
    </div>
</div>
<div class="contenedor-cont-vistas">
    <?php $this->renderPartial('_form_update', array('model'=>$model)); ?>
</div>