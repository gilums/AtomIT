<h1>MARCAS <small>CREAR</small></h1>
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

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
