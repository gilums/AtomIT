<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */

$this->breadcrumbs=array(
	'Departamentos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'List Departamento', 'url'=>array('index')),
	array('label'=>'Manage Departamento', 'url'=>array('admin')),
);
?>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h2 class="modal-title" id="myModalLabel">Crear Departamento</h2>
</div>
<br>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>