<?php
/* @var $this ParametrosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Parametroses',
);

$this->menu=array(
	array('label'=>'Create Parametros', 'url'=>array('create')),
	array('label'=>'Manage Parametros', 'url'=>array('admin')),
);
?>

<h1>Parametroses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
