<?php
/* @var $this DepartamentoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Departamentos',
);

$this->menu=array(
	array('label'=>'Create Departamento', 'url'=>array('create')),
	array('label'=>'Manage Departamento', 'url'=>array('admin')),
);

?>

<h1>Departamentos</h1>
<br>
<div class="row">
	<div class="col-lg-12">
		<button class="btn btn-primary btnCrearDepto" data-toggle="modal" data-target="#myModal">
		  Crear
		</button>
	</div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'departamento-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nombre',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog">
	    <div class="modal-content">
	    
	      <div class="modal-body">
	        ...
	      </div>

	    </div>
  	</div>
</div>