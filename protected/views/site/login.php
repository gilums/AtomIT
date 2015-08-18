<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>




<<<<<<< HEAD
<div class="cont-interno-login">
	<div class="col-lg-12 login-titulo">
         <a href="#" class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_login.png"><span>AtomIt</span></a>
	</div>
	<div class="col-lg-12 login-contenido">
		<br>
		
		<div class="form-horizontal col-md-offset-1 col-lg-10" role="form">
=======
<div class="row">
	<div class="col-lg-6 login-titulo">
		<h1>AtomIT</h1>
		<h2>Sistema de Gestion de Ordenes</h2>	
	</div>
	<div class="col-lg-6 login-contenido">
		<br>
		<div class="col-lg-2"></div>
		<div class="form-horizontal col-lg-8 centrar" role="form">
>>>>>>> origin/master
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>
				
				<div class="form-group">
					<div class="col-lg-12">
<<<<<<< HEAD
						<?php #echo $form->labelEx($model,'username'); ?>
						<?php echo $form->textField($model,'username',array('class'=>'form-input','placeholder'=>'Nick')); ?>
=======
						<?php echo $form->labelEx($model,'username'); ?>
						<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
>>>>>>> origin/master
						<?php echo $form->error($model,'username'); ?>
					</div>
				</div>	

				<div class="form-group">
					<div class="col-lg-12">
<<<<<<< HEAD
						<?php #echo $form->labelEx($model,'password'); ?>
						<?php echo $form->passwordField($model,'password',array('class'=>'form-input','placeholder'=>'Password')); ?>
=======
						<?php echo $form->labelEx($model,'password'); ?>
						<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
>>>>>>> origin/master
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
<<<<<<< HEAD
					<div class="col-lg-12 text-center">
						<?php echo CHtml::submitButton('Login', array('class'=>'btn btn-default btn-login')); ?>
=======
					<div class="col-lg-12">
						<?php echo CHtml::submitButton('Login', array('class'=>'btn btn-default')); ?>
>>>>>>> origin/master
					</div>
				</div>

			<?php $this->endWidget(); ?>
		</div><!-- form -->		
	</div>
</div>


