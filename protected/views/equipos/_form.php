<?php
/* @var $this EquiposController */
/* @var $model Equipos */
/* @var $form CActiveForm */
?>

<div class="forml">

<?php $form = $this->beginWidget('booster.widgets.TbActiveForm',
	array(
		'id' => 'equipos-form',
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
			<?php echo $form->labelEx($model,'modelo'); ?>
		</div>
		<div class="col-lg-6">			
			<?php echo $form->textField($model,'modelo',array('maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'modelo'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'nro_serie'); ?>
		</div>
		<div class="col-lg-6">	
			<?php echo $form->textField($model,'nro_serie',array('maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nro_serie'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'tipo'); ?>
		</div>
		<div class="col-lg-6">	
			<?php echo $form->textField($model,'tipo',array('maxlength'=>8,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'tipo'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'id_marca'); ?>
		</div>
		<div class="col-lg-6">
			<?php echo $form->dropDownList($model,'id_marca', CHtml::listData(Marcas::model()->findAll(), 'id','nombre'),array('class'=>'form-control'));?>
			<?php echo $form->error($model,'id_marca'); ?>
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