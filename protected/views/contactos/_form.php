<?php
/* @var $this ContactosController */
/* @var $model Contactos */
/* @var $form CActiveForm */
?>

<div class="forml">

<?php $form = $this->beginWidget('booster.widgets.TbActiveForm',
	array(
		'id' => 'contactos-form',
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
	
	<!-- VER ESTO --> 
	<div class="form-group public_drop">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'id_cliente'); ?>
		</div>

		<div class="col-lg-6">		
			<?php $this->widget(
			    'booster.widgets.TbSelect2',
			    array(
			    	'model' => $model,
			        'attribute' => 'id_cliente',
			        'asDropDownList' => true,
			        'data' => CHtml::listData(Clientes::model()->findAll(), 'id', 'nombre'),
			        'options' => array(
			            'placeholder' => '--Seleccione--',
			            'width' => '100%',
			        )
			    )
			); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'nombre'); ?>
		</div>
		<div class="col-lg-6">	
			<?php echo $form->textField($model,'nombre',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'apellido'); ?>
		</div>
		<div class="col-lg-6">	
			<?php echo $form->textField($model,'apellido',array('size'=>30,'maxlength'=>30,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'apellido'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'telefono'); ?>
		</div>
		<div class="col-lg-6">	
			<?php echo $form->textField($model,'telefono',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'telefono'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'email'); ?>
		</div>
		<div class="col-lg-6">	
			<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'email'); ?>
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