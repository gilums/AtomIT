<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
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
		'nick',
		array(
			'wrapperHtmlOptions' => array(
				'class' => 'col-sm-3',
			),
		)
	); ?>

	<?php echo $form->datePickerGroup(
			$model,
			'fecha_creacion',
			array(
				'widgetOptions' => array(
					'options' => array(
						'language' => 'es',
					),
				),
				'wrapperHtmlOptions' => array(
					'class' => 'col-sm-3',
				),
				//'hint' => 'Click inside! This is a super cool date field.',
				//'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
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