<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */

/*$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);*/



?>

<h1>Orden <?php echo $model->id; ?> </h1>
<?php $this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Ordenes' => 'index',$model->id), 
    )
); ?>
<?php $this->renderPartial('_form_update', array('model'=>$model)); ?>