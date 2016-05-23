<?php
/* @var $this MarcasController */
/* @var $model Marcas */
/* @var $form CActiveForm */
?>

<div class="forml">

<?php $form = $this->beginWidget('booster.widgets.TbActiveForm',
	array(
		'id' => 'marcas-form',
		'type' => 'horizontal',
		'enableAjaxValidation'=>true,
	)
); 

?>
	<p class="note">Requeridos<span class="required">*</span></p>
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