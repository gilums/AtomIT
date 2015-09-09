<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="form-horizontal" role="form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'usuarios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
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
			<?php echo $form->passwordField($model,'pass',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'pass'); ?>
		</div>
	</div>
	
	<?php echo $form->fileFieldGroup($model, 'foto',
        array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
        )
    ); ?>
	
<!--
	<div class="row">
		<?php #echo $form->labelEx($model,'fecha_creacion'); ?>
		<?php #echo $form->textField($model,'fecha_creacion'); ?>
		<?php #echo $form->error($model,'fecha_creacion'); ?>
	</div>
-->
	<div class="form-group">
		<div class="col-lg-2">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-default')); ?>
		</div>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->