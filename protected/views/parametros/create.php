<?php
/* @var $this ParametrosController */
/* @var $model Parametros */

$this->breadcrumbs=array(
	'Parametroses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Parametros', 'url'=>array('index')),
	array('label'=>'Manage Parametros', 'url'=>array('admin')),
);
?>

<h1>Create Parametros</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>