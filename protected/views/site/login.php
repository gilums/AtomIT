<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);

$this->widget('ext.ypace.YPace', array(
    'theme' => 'other' 
));

?>


<div class="cont-interno-login wow fadeIn" data-wow-duration="0.5s" data-wow-delay="2.5s">
	<div class="col-lg-12 login-titulo">
         <a href="#" class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_login.png"><span>AtomIt</span></a>
	</div>
	<div class="col-lg-12 login-contenido">
		<br>
		
		<div class="form-horizontal col-md-offset-1 col-lg-10" role="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>
				
				<div class="form-group">
					<div class="col-lg-12">
						<?php #echo $form->labelEx($model,'username'); ?>
						<?php echo $form->textField($model,'username',array('class'=>'form-input','placeholder'=>'Nick')); ?>

						<?php echo $form->error($model,'username'); ?>
					</div>
				</div>	

				<div class="form-group">
					<div class="col-lg-12">
						<?php #echo $form->labelEx($model,'password'); ?>
						<?php echo $form->passwordField($model,'password',array('class'=>'form-input','placeholder'=>'Password')); ?>
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
					<div class="col-lg-12 text-center">
						<?php echo CHtml::submitButton('Login', array('class'=>'btn btn-default btn-login')); ?>

					</div>
				</div>

			<?php $this->endWidget(); ?>
		</div><!-- form -->		
	</div>
</div>


