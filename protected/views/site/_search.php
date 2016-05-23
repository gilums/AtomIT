<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */
/* @var $form CActiveForm */
?>

<div class="forml cont-buscador-index row">
<?php $form = $this->beginWidget('booster.widgets.TbActiveForm',
	array(
		'action'=>Yii::app()->createUrl($this->route),
		'id'=>'buscador-id',
		'type' => 'horizontal',
		'method'=>'get',
	)
); 

?>
<div class="col-lg-11">	

	<div class="col-lg-4">
		<?php echo $form->textFieldGroup(
			$model, 
			'id',
			array(
				'labelOptions' => array('label' => false),
				'wrapperHtmlOptions' => array(
					'class' => 'col-lg-12',
				),
				)
			);
		#echo $form->textField($model,'id',array('class'=>'form-control','placeholder'=>'ID')); ?>
	</div>

	<!--<div class="form-group public_drop">
		<div class="col-lg-12">		
			<?php /*$this->widget(
			    'booster.widgets.TbSelect2',
			    array(
			    	'model' => $model,
			        'attribute' => 'id_equipo',
			        'asDropDownList' => true,
			        'data' => CHtml::listData(Equipos::model()->findAll(), 'id', 'nro_serie'),
			        'options' => array(
			            'placeholder' => 'Equipos',
			            'width' => '100%',
			        )
			       
			    )
			); */?>
		</div>
	</div>-->


		<div class="col-lg-4">	
			<?php echo $form->typeAheadGroup(
			    $model,
			    'id_equipo',
			    array(
			        'widgetOptions' => array(
			            'options'=>array(
			                'hint' => true,
			                'highlight' => true,
			                'minLength' => 1,
			            ),
			            'datasets'=>array(
		            		'source' => CHtml::listData(Equipos::model()->findAll(), 'id', 'nro_serie'),
		            		),         
			        ),
			        'labelOptions' => array(
			            'label' => false,
			        ),
			        'wrapperHtmlOptions' => array(
							'class' => 'col-lg-12',
					),
			    )
			);?>
		</div>

		<div class="col-lg-4">
			<?php echo $form->typeAheadGroup(
			    $model,
			    'id_cliente',
			    array(
			        'widgetOptions' => array(
			            'options'=>array(
			                'hint' => true,
			                'highlight' => true,
			                'minLength' => 1,
			                'placeholder'=>'Clientes',
			            ),
			            'datasets'=>array(
		            		'source' => CHtml::listData(Clientes::model()->findAll(), 'id', 'nombre'),
		            		),         
			        ),
			        'labelOptions' => array(
			            'label' => false,
			        ),
			        'wrapperHtmlOptions' => array(
							'class' => 'col-lg-12',
					),
			    )
			);?>
		</div>
	
	<div class="col-lg-4">
		<div class="form-group">
			<div class="col-lg-12">
			<?php echo ZHtml::enumDropDownList($model,'condicion',array('class'=>'form-control','empty'=>'Condicion')); ?>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="form-group">
			<div class="col-lg-12">	
				<?php echo ZHtml::enumDropDownList($model,'estado',array('class'=>'form-control','empty'=>'Estado')); ?>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="form-group">
			<div class="col-lg-12">	
				<?php echo ZHtml::enumDropDownList($model,'transporte',array('class'=>'form-control','empty'=>'Transporte')); ?>
			</div>
		</div>
	</div>

		<div class="col-lg-4">	
			<?php echo $form->datePickerGroup(
				$model,
				'fecha_ingreso',
				array(
					'widgetOptions' => array(
						'options' => array(
							'language' => 'es',
						),
					),
					'wrapperHtmlOptions' => array(
							'class' => 'col-lg-12',
					),
					'placeholder'=>'FECHA INGRESO',
					'labelOptions' => array('label' => false),
					//'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
				)
			); ?>
		</div>
	

	
		<div class="col-lg-4">	
			<?php echo $form->datePickerGroup(
				$model,
				'fecha_cierre',
				array(
					'widgetOptions' => array(
						'options' => array(
							'language' => 'es',
						),
					),
					'wrapperHtmlOptions' => array(
							'class' => 'col-lg-12',
					),
					'placeholder'=>'FECHA CIERRE',
					'labelOptions' => array('label' => false),
					//'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
				)
			); ?>
		</div>

		<div class="col-lg-4">	
			<?php echo $form->datePickerGroup(
				$model,
				'fecha_retiro',
				array(
					'widgetOptions' => array(
						'options' => array(
							'language' => 'es',
							'format' => 'yyyy-mm-dd',
		        			'viewformat' => 'mm/dd/yyyy',
						),
					),
					'wrapperHtmlOptions' => array(
							'class' => 'col-lg-12',
					),
					'placeholder'=>'FECHA RETIRO',
					'labelOptions' => array('label' => false),
					//'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
				)
			); ?>
		</div>
</div>
<div class="col-lg-1">
	<div class="col-lg-12 final">
		<?php echo $form->switchGroup($model, 'finalizada',
				array(
					'widgetOptions' => array(
						'events'=>array(
							'switchChange'=>'js:function(event, state) {
							  console.log(this); // DOM element
							  console.log(event); // jQuery event
							  console.log(state); // true | false
							}'
						),
						'options' => array(
				            'size' => 'mini', //null, 'mini', 'small', 'normal', 'large
				            'onColor' => 'default', // 'primary', 'info', 'success', 'warning', 'danger', 'default'
				            'offColor' => 'danger',  // 'primary', 'info', 'success', 'warning', 'danger', 'default'
				            'indeterminate'=>true,
				        ),
					),
					'labelOptions' => array('class' => 'col-lg-12'),
					'wrapperHtmlOptions' => array(
							'class' => 'col-lg-12',
					),

				)
			); ?>
	</div>
	<div class="text-right">
		<div class="col-lg-12">
			<?php echo CHtml::submitButton('Buscar',array('class'=>'btn btn-default')); ?>
		</div>
		<div class="col-lg-12">
			<?php echo CHtml::resetButton('Borrar',array('class'=>'btn btn-primary')); ?>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->

