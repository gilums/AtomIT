<?php
/* @var $this CiudadController */
/* @var $model Ciudad */
/* @var $form CActiveForm */
?>


<div class="forml form-horizontal" role="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ciudad-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

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

	<div class="form-group">
		<div class="col-lg-2">
			<b>Departamento</b>
		</div>
		<div class="col-lg-6">	
			<?php echo $form->dropDownList($model,'id_departamento', CHtml::listData(Departamento::model()->findAll(), 'id','nombre'));?>
			<?php echo $form->error($model,'id_departamento'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-2">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-default')); ?>
		</div>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->