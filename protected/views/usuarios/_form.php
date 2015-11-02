<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="form" role="form">    
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'usuarios-form',
    'type' => 'horizontal',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'
    )
)); ?>
	
	<p class="note">Requeridos<span class="required">*</span></p>

	<div class="form-group">
		<div class="col-lg-12">
			<?php echo $form->errorSummary($model); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'nick'); ?>
		</div>
		<div class="col-lg-6">	
			<?php echo $form->textField($model,'nick',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'nick'); ?>
		</div>
	</div>
    
    <div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'pass'); ?>
		</div>
		<div class="col-lg-6">
			<?php echo $form->textField($model,'pass',array('size'=>20,'maxlength'=>125)); ?>
			<?php echo $form->error($model,'pass'); ?>
		</div>
	</div>
	
	
    <div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'pin'); ?>
		</div>
		<div class="col-lg-6">	
			<?php echo $form->textField($model,'pin'); ?>
			<?php echo $form->error($model,'pin'); ?>
		</div>
	</div>
   
    <div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'nombre'); ?>
		</div>
		<div class="col-lg-6">	
			<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>
	</div>
	
    <div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'apellido'); ?>
		</div>
		<div class="col-lg-6">	
			<?php echo $form->textField($model,'apellido',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'apellido'); ?>
		</div>
	</div>

    <div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'direccion'); ?>
		</div>
		<div class="col-lg-6">	
			<?php echo $form->textField($model,'direccion',array('size'=>50,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'direccion'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'email'); ?>
		</div>
		<div class="col-lg-6">	
			<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'celular'); ?>
		</div>
		<div class="col-lg-6">	
			<?php echo $form->textField($model,'celular'); ?>
			<?php echo $form->error($model,'celular'); ?>
		</div>
	</div>
	
	<?php if(!$model->isNewRecord){ ?>
	<div class="form-group">
		<div class="col-lg-2">
			<?php echo $form->labelEx($model,'estado'); ?>
		</div>
		<div class="col-lg-6">
			 <div class="material-switch">
				<?php echo $form->checkBox($model,'estado',array('name'=>'estado')); ?>
			 	<label for='estado' class="label-danger"></label>
			 </div>
			<?php echo $form->error($model,'estado'); ?>
		</div>
	</div>
	<?php } ?>

	<?php echo $form->fileFieldGroup($model, 'foto',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
        )
    ); ?>
	
	<div class="form-group">
		<div class="col-lg-2">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-default')); ?>
		</div>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->