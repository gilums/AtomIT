<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>




<div class="row">
	<div class="col-lg-6 login-titulo">
		<h1>AtomIT</h1>
		<h2>Sistema de Gestion de Ordenes</h2>	
	</div>
	<div class="col-lg-6 login-contenido">
		<br>
		<div class="col-lg-2"></div>
		<div class="form-horizontal col-lg-8 centrar" role="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>
				
				<div class="form-group">
					<div class="col-lg-12">
						<?php echo $form->labelEx($model,'username'); ?>
						<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
						<?php echo $form->error($model,'username'); ?>
					</div>
				</div>	

				<div class="form-group">
					<div class="col-lg-12">
						<?php echo $form->labelEx($model,'password'); ?>
						<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
						<?php echo $form->error($model,'password'); ?>
					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-12">
						<?php echo $form->checkBox($model,'rememberMe'); ?>
						<?php echo $form->label($model,'rememberMe'); ?>
						<?php echo $form->error($model,'rememberMe'); ?>
					</div>
				</div>	
				

				<div class="form-group">
					<div class="col-lg-12">
						<?php echo CHtml::submitButton('Login', array('class'=>'btn btn-default')); ?>
					</div>
				</div>

			<?php $this->endWidget(); ?>
		</div><!-- form -->		
	</div>
</div>


