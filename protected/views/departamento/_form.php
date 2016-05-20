<?php
/* @var $this DepartamentoController */
/* @var $model Departamento */
/* @var $form CActiveForm */
?>

<div class="forml" role="form">

<?php $form = $this->beginWidget('booster.widgets.TbActiveForm',
	array(
		'id' => 'departamento-form',
		'type' => 'horizontal',
		'enableAjaxValidation'=>true,
	)
); 

?>
	<p class="note">Requeridos <span class="required">*</span></p>

	<div class="form-group">
		<div class="col-lg-12">
			<?php echo $form->errorSummary($model); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'nombre'); ?>	
		</div>
		<div class="col-lg-6">	
			<?php echo $form->textField($model,'nombre',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
			<div class="col-lg-2">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-default')); ?>
			</div>
		</div>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->