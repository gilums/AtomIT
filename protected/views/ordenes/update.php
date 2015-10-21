<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */

/*$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);*/

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Ordenes' => 'index','update'), 
    )
);

?>

<h1>Update Ordenes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form_update', array('model'=>$model)); ?>