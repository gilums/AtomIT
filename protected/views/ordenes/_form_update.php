<?php
/* @var $this OrdenesController */
/* @var $model Ordenes */
/* @var $form CActiveForm */
?>

<div class="forml" role="form">
<?php $form = $this->beginWidget('booster.widgets.TbActiveForm',
	array(
		'id' => 'ordenes-form',
		'type' => 'horizontal',
		'enableAjaxValidation'=>true,
	)
); 

if ($model->isNewRecord==false) { 
		$equipo=Equipos::model()->findByPk($model->id_equipo);
	}	
?>
	<div class="form-group">
		<div class="col-lg-12">
			<?php echo $form->errorSummary(array ($model,$equipo));?>
		</div>
	</div>
	


<div class="row">

	<div class="col-lg-12">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tabs-left">
          <li class="active"><a showtab="" href="#diag" data-toggle="tab">Diagnostico</a></li>
          <li><a showtab="" href="#pre" data-toggle="tab">Presupuesto</a></li>
          <li><a showtab="" href="#infg" data-toggle="tab">Información General</a></li>
        </ul>

	    <div class="contenedor_tabs_ordenes">
            <div class="tab-content">
                <div class="tab-pane active" id="diag">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <div class="col-lg-3">
                                <?php echo $form->labelEx($model,'falla'); ?>
                            </div>
                            <div class="col-lg-8">	
                                <?php echo $form->textArea($model,'falla',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'falla'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <?php echo $form->labelEx($model,'condicion'); ?>
                            </div>
                            <div class="col-lg-8">
                                <?php echo ZHtml::enumDropDownList($model,'condicion',array('class'=>'form-control')); ?>
                                <?php echo $form->error($model,'condicion'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <?php echo $form->labelEx($model,'estado'); ?>
                            </div>
                            <div class="col-lg-8">	
                                <?php echo ZHtml::enumDropDownList($model,'estado',array('class'=>'form-control')); ?>
                                <?php echo $form->error($model,'estado'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <?php echo $form->labelEx($model,'transporte'); ?>
                            </div>
                            <div class="col-lg-8">	
                                <?php echo ZHtml::enumDropDownList($model,'transporte',array('class'=>'form-control')); ?>
                                <?php echo $form->error($model,'transporte'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <?php echo $form->labelEx($model,'finalizada'); ?>
                            </div>
                            <div class="col-lg-8">	
                                <?php echo $form->checkBox($model,'finalizada'); ?>
                                <?php echo $form->error($model,'finalizada'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="form-group">
                            <div class="col-lg-3">
                                <?php echo $form->labelEx($model,'diagnostico'); ?>
                            </div>
                            <div class="col-lg-8">	
                                <?php echo $form->textArea($model,'diagnostico',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'diagnostico'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <?php echo $form->labelEx($model,'solucion'); ?>
                            </div>
                            <div class="col-lg-8">	
                                <?php echo $form->textArea($model,'solucion',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'solucion'); ?>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="col-lg-12">
                        <div class="form-group">
                        <div class="col-lg-12">
                            <?php echo CHtml::submitButton('Guardar',array('class'=>'btn btn-default')); ?>
                            <?php echo CHtml::submitButton('Guardar/Imprimir',array('class'=>'btn btn-primary','onClick'=>'lanzarPdf()')); ?>
                            <!--<?php #echo CHtml::submitButton('Guardar/Imprimir',array('class'=>'btn btn-primary','name'=>'upandimp','id'=>'lanzarPdf')); ?>-->
                        </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="infg">
                    <div class="col-lg-6 ">
                        <div class="form-group">
                            <div class="col-lg-3">
                                <?php echo $form->labelEx($equipo,'modelo'); ?>
                            </div>
                            <div class="col-lg-8">	
                                <?php echo $form->textField($equipo,'modelo',array('size'=>50,'maxlength'=>50,'class'=>'form-control',"disabled" => "disabled")); ?>
                                <?php echo $form->error($equipo,'modelo'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <?php echo $form->labelEx($equipo,'nro_serie'); ?>
                            </div>
                            <div class="col-lg-8">	
                                <?php echo $form->textField($equipo,'nro_serie',array('size'=>50,'maxlength'=>50,'class'=>'form-control',"disabled" => "disabled")); ?>
                                <?php echo $form->error($equipo,'nro_serie'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <?php echo $form->labelEx($equipo,'tipo'); ?>
                            </div>
                            <div class="col-lg-8">	
                                <?php echo ZHtml::enumDropDownList($equipo,'tipo',array('class'=>'form-control',"disabled" => "disabled")); ?>
                                <?php echo $form->error($equipo,'tipo'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <?php echo $form->labelEx($equipo,'id_marca'); ?>
                            </div>
                            <div class="col-lg-8">
                                <?php echo $form->dropDownList($equipo,'id_marca', CHtml::listData(Marcas::model()->findAll(), 'id','nombre'),array('class'=>'form-control',"disabled" => "disabled"));?>
                                <?php echo $form->error($equipo,'id_marca'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="form-group public_drop">
                            <div class="col-sm-3">
                                <?php echo $form->labelEx($model,'id_cliente'); ?>
                            </div>


                            <div class="col-sm-8">		
                                <?php $this->widget(
                                    'booster.widgets.TbSelect2',
                                    array(
                                        'model' => $model,
                                        'attribute' => 'id_cliente',
                                        'asDropDownList' => true,
                                        'htmlOptions' => array('disabled' => true),
                                        'data' => CHtml::listData(Clientes::model()->findAll(), 'id', 'nombre'),
                                        'options' => array(
                                            'placeholder' => 'Ingrese un cliente',
                                            'width' => '100%',
                                            
                                        )
                                        

                                    )
                                ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="pre">
                    <div class="col-md-12 col-lg-12">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <?php #echo $form->labelEx($model,'nota'); ?>
                                <?php echo $form->textArea($model,'nota',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
                                <?php echo $form->error($model,'nota'); ?>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
	</div>
</div>


<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
    function lanzarPdf(){
           //alert(id);
           var url='<?php echo Yii::app()->createUrl("ordenes/pdfcreate", array('id'=>$model->id)); ?>';
           window.open(url, "_blank", "width=900,height=700"); 
           return false;
    }
</script>

