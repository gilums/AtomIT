<?php
/* @var $this MarcasController */
/* @var $model Marcas */
/* @var $form CActiveForm */
?>

<div class="forml">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'marcas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<div class="col-md-6">		
		<div class="form-group">
			<div class="col-lg-12">
				<?php echo $form->errorSummary($model); ?>
			</div>
		</div>

	    <div class="form-group">
			<div class="col-lg-4">
				<?php echo $form->labelEx($model,'nombre'); ?>
			</div>
			<div class="col-lg-8">	
				<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>30,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'nombre'); ?>
			</div>
		</div>
	</div>

	<div class="col-md-12">	
		<div class="form-group">
			<div class="col-lg-6">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-default')); ?>
			</div>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->