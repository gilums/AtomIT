<?php
<<<<<<< HEAD
/* @var $this CiudadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ciudads',
);

$this->menu=array(
	array('label'=>'Create Ciudad', 'url'=>array('create')),
	array('label'=>'Manage Ciudad', 'url'=>array('admin')),
);
?>

<h1>Ciudads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
=======
/* @var $this UsuariosController */
/* @var $dataProvider CActiveDataProvider */

$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Ciudad' => 'index'), 
    )
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.filters').toggle();
	return false;
});
");
?>


<div class="panel panel-default">
    <div class="panel-heading text-left">Administrador Ciudad <a href="#" class="btn-link btn-sm search-button"><i class="fa fa-search"></i></a><a href="<?php echo Yii::app()->createAbsoluteUrl('ciudad/create'); ?>" class="btn-link btn-sm"><i class="fa fa-plus"></i></a></div>

<div class="panel-body admin">
<?php $this->widget('booster.widgets.TbExtendedGridView', array(
	'id'=>'ciudad-grid',
	'type' => 'condensed',
	'dataProvider'=>$model->search(),
    'responsiveTable' => true,
	'template' => "{items}{pager}",
	'filter'=>$model,
	'columns'=>	array(
			array('name'=>'id', 'header'=>'#', 'htmlOptions'=>array('style'=>'width: 60px')),
			array('name'=>'nombre', 'header'=>'Nombre'),
			array('name'=>'id_departamento','value'=>'$data->departamento->nombre', 'header'=>'Departamento'),
			array(
				'htmlOptions' => array('nowrap'=>'nowrap'),
				'class'=>'booster.widgets.TbButtonColumn',
                'deleteConfirmation'=>'Esta seguro que desea eliminar la ciudad?',
				'viewButtonUrl'=>'Yii::app()->createUrl("ciudad/view", array("id"=>$data->id))',
				'updateButtonUrl'=>'Yii::app()->createUrl("ciudad/update", array("id"=>$data->id))',
				'deleteButtonUrl'=>'Yii::app()->createUrl("ciudad/delete", array("id"=>$data->id))',
			),
		),

)); ?>
    </div>
<div>
>>>>>>> origin/master
