<?php
/* @var $this ClientesController */
/* @var $model Clientes */
/* @var $form CActiveForm */
?>


<div class="wide form">

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'type' => 'inline',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
	
	<?php echo $form->textFieldGroup(
		$model,
		'id',
		array(
			'wrapperHtmlOptions' => array(
				'class' => 'col-sm-3',
			),
		)
	); ?>
	
	<?php echo $form->textFieldGroup(
		$model,
		'nombre',
		array(
			'wrapperHtmlOptions' => array(
				'class' => 'col-sm-3',
			),
		)
	); ?>

	<?php echo $form->textFieldGroup(
		$model,
		'rut',
		array(
			'wrapperHtmlOptions' => array(
				'class' => 'col-sm-3',
			),
		)
	); ?>

	<?php echo $form->textFieldGroup(
		$model,
		'razon_social',
		array(
			'wrapperHtmlOptions' => array(
				'class' => 'col-sm-3',
			),
		)
	); ?>

	<?php echo $form->textFieldGroup(
		$model,
		'direccion',
		array(
			'wrapperHtmlOptions' => array(
				'class' => 'col-sm-3',
			),
		)
	); ?>

	<?php echo $form->textFieldGroup(
		$model,
		'email',
		array(
			'wrapperHtmlOptions' => array(
				'class' => 'col-sm-3',
			),
		)
	); ?>

	<?php $this->widget(
		'booster.widgets.TbButton',
		array(
			'buttonType' => 'submit',
			'context' => 'default',
			'label' => 'Buscar'
		)
	); ?>


<?php $this->endWidget(); ?>

</div><!-- search-form -->