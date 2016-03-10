<?php
/* @var $this ClientesController */
/* @var $model Clientes */
/* @var $form CActiveForm */
?>

<div class="form" role="form">    
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'clientes-form',
    'type' => 'horizontal',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Requeridos<span class="required">*</span></p>
	<div class="form-group">
		<div class="col-lg-12">
			<?php echo $form->errorSummary($model); ?>
		</div>
	</div>
	<div class="col-md-6">

		<div class="form-group">
			<div class="col-lg-4">
				<?php echo $form->labelEx($model,'nombre'); ?>
			</div>
			<div class="col-lg-8">	
				<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'nombre'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-4">
				<?php echo $form->labelEx($model,'rut'); ?>
			</div>
			<div class="col-lg-8">	
				<?php echo $form->textField($model,'rut',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'rut'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-4">
				<?php echo $form->labelEx($model,'razon_social'); ?>
			</div>
			<div class="col-lg-8">	
				<?php echo $form->textField($model,'razon_social',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'razon_social'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-4">
				<?php echo $form->labelEx($model,'direccion'); ?>
			</div>
			<div class="col-lg-8">	
				<?php echo $form->textField($model,'direccion',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'direccion'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-4">
				<?php echo $form->labelEx($model,'email'); ?>
			</div>
			<div class="col-lg-8">	
				<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-lg-4">
				<?php echo $form->labelEx($model,'web'); ?>
			</div>
			<div class="col-lg-8">	
				<?php echo $form->textField($model,'web',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'web'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-4">
				<?php echo $form->labelEx($model,'telefono'); ?>
			</div>
			<div class="col-lg-8">	
				<?php echo $form->textField($model,'telefono',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'telefono'); ?>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<div class="col-lg-4">
				<?php echo $form->labelEx($model,'agencia'); ?>
			</div>
			<div class="col-lg-8">	
				<?php echo $form->textField($model,'agencia',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'agencia'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-4">
				<?php echo $form->labelEx($model,'nota'); ?>
			</div>
			<div class="col-lg-8">	
				<?php echo $form->textArea($model,'nota',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
				<?php echo $form->error($model,'nota'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-4">
				<b>Departamento</b>
			</div>
			<div class="col-lg-8">
				<?php 
					$htmlOptions=array(
							'class'=>'form-control',
							'ajax'=>array(
								'url'=>$this->createUrl('ciudadByDepartamentos'),
								'type'=>'POST',
								'update'=>'#Clientes_id_ciudad',
								'beforeSend' => 'function(){
			                        $("#Clientes_id_barrio").find("option").remove();
			                     	}',
								),
							'prompt' => '--Seleccione--',	
						);
				 ?>
				<?php echo $form->dropDownList($model,'id_departamento',$model->getMenuDepartamentos(),$htmlOptions);?>
				<?php echo $form->error($model,'id_departamento'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-4">
				<b>Ciudad</b>
			</div>
			<div class="col-lg-8">
				<?php 
					$htmlOptions2=array(
							'class'=>'form-control',
							'ajax'=>array(
								'url'=>$this->createUrl('barriosByCiudad'),
								'type'=>'POST',
								'update'=>'#'.CHtml::activeId($model,'id_barrio'),
								),
							'prompt' => '--Seleccione--',
						);
				 ?>
				<?php echo $form->dropDownList($model,'id_ciudad',$model->getMenuCuidades(),$htmlOptions2);?>
				<?php echo $form->error($model,'id_ciudad'); ?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-4">
				<b>Barrio</b>
			</div>
			<div class="col-lg-8">
				<?php echo $form->dropDownList($model,'id_barrio',$model->getMenuBarrios(),array('class'=>'form-control','prompt' => '--Seleccione--'));?>
				<?php echo $form->error($model,'id_barrio'); ?>
			</div>
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