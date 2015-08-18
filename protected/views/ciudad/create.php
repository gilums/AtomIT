<?php
/* @var $this CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs=array(
<<<<<<< HEAD
	'Ciudads'=>array('index'),
	'Create',
=======
	'Ciudades'=>array('index'),
	'Crear',
>>>>>>> origin/master
);

$this->menu=array(
	array('label'=>'List Ciudad', 'url'=>array('index')),
	array('label'=>'Manage Ciudad', 'url'=>array('admin')),
);
?>

<<<<<<< HEAD
<h1>Create Ciudad</h1>
=======
<h1>Crear Ciudad</h1>
>>>>>>> origin/master

<?php $this->renderPartial('_form', array('model'=>$model)); ?>