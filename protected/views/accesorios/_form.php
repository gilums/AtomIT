<?php
/* @var $this AccesoriosController */
/* @var $model Accesorios */
/* @var $form CActiveForm */
?>

<div class="forml">

<?php $form = $this->beginWidget('booster.widgets.TbActiveForm',
	array(
		'id' => 'accesorios-form',
		'type' => 'horizontal',
		'enableAjaxValidation'=>true,
	)
); 

?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="form-group">
		<div class="col-lg-12">
			<?php echo $form->errorSummary($model); ?>
		</div>
	</div>
<div class="col-lg-6">
	<div class="form-group">
		<div class="col-lg-4">
			<?php echo $form->labelEx($model,'nombre'); ?>
		</div>
		<div class="col-lg-8">	
			<?php echo $form->textField($model,'nombre',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>
</div>
	<div class="form-group">
		<div class="col-lg-12">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-default')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->