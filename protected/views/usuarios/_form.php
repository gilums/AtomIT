<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="forml" role="form">    
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'usuarios-form',
    'type' => 'horizontal',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'
    )
)); ?>
	
	<p class="note">Requeridos<span class="required">*</span></p>
<div class="col-lg-6">	
	<div class="form-group">
		<div class="col-lg-12">
			<?php echo $form->errorSummary($model); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-4">
			<?php echo $form->labelEx($model,'nick'); ?>
		</div>
		<div class="col-lg-8">	
			<?php echo $form->textField($model,'nick',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'nick'); ?>
		</div>
	</div>
    
    <div class="form-group">
		<div class="col-lg-4">
			<?php echo $form->labelEx($model,'pass'); ?>
		</div>
		<div class="col-lg-8">
			<?php echo $form->textField($model,'pass',array('size'=>20,'maxlength'=>125,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'pass'); ?>
		</div>
	</div>
	
	
    <div class="form-group">
		<div class="col-lg-4">
			<?php echo $form->labelEx($model,'pin'); ?>
		</div>
		<div class="col-lg-8">	
			<?php echo $form->textField($model,'pin',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'pin'); ?>
		</div>
	</div>
   
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
			<?php echo $form->labelEx($model,'apellido'); ?>
		</div>
		<div class="col-lg-8">	
			<?php echo $form->textField($model,'apellido',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'apellido'); ?>
		</div>
	</div>

    <div class="form-group">
		<div class="col-lg-4">
			<?php echo $form->labelEx($model,'direccion'); ?>
		</div>
		<div class="col-lg-8">	
			<?php echo $form->textField($model,'direccion',array('size'=>50,'maxlength'=>200,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'direccion'); ?>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-lg-4">
			<?php echo $form->labelEx($model,'email'); ?>
		</div>
		<div class="col-lg-8">	
			<?php echo $form->textField($model,'email',array('size'=>50,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-4">
			<?php echo $form->labelEx($model,'celular'); ?>
		</div>
		<div class="col-lg-8">	
			<?php echo $form->textField($model,'celular',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'celular'); ?>
		</div>
	</div>
	
	<?php if(!$model->isNewRecord){ ?>
    <?php echo $form->switchGroup($model, 'estado',
        array(
            'widgetOptions' => array(
                'options' => array(
                    'size' => 'mini', //null, 'mini', 'small', 'normal', 'large
                    'onColor' => 'default', // 'primary', 'info', 'success', 'warning', 'danger', 'default'
                    'offColor' => 'danger',  // 'primary', 'info', 'success', 'warning', 'danger', 'default'
                ),
            ),
            'labelOptions' => array('class' => 'col-lg-4 check-estado'),
            'wrapperHtmlOptions' => array(
                    'class' => 'col-lg-6',
            ),

        )
    ); ?>
	<?php } ?>
</div>	
<div class="col-md-6">
	<div class="col-md-12" id="vista-foto">
		<?php if(!$model->isNewRecord){ 
			echo CHtml::image(Yii::app()->createUrl('usuarios/loadImage', array('id'=>$model->id)),'',array('class'=>'img-responsive thumb')); 
		}else{?>
			<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/default.jpg" alt="">
		<?php } ?>
	</div>
	<div class="inputFile">
		<?php echo $form->fileFieldGroup($model, 'foto',
	        array(
	            'wrapperHtmlOptions' => array(
	                'class' => 'file-input',
	            ),
	        )
	    ); ?>
    </div>
</div>
<div class="col-md-12">	
	<div class="form-group">
		<div class="col-lg-6">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-default')); ?>
		</div>
	</div>
</div>


<?php $this->endWidget(); ?>

</div><!-- form -->


<script type="text/javascript">
	
	function archivo(evt) {
      var files = evt.target.files; // FileList object
       
        //Obtenemos la imagen del campo "file". 
      for (var i = 0, f; f = files[i]; i++) {         
           //Solo admitimos imágenes.
           if (!f.type.match('image.*')) {
                continue;
           }
       
           var reader = new FileReader();
           
           reader.onload = (function(theFile) {
               return function(e) {
               // Creamos la imagen.
                      document.getElementById("vista-foto").innerHTML = ['<img class="thumb" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
               };
           })(f);
 
           reader.readAsDataURL(f);
       }
	}
             
    document.getElementById('Usuarios_foto').addEventListener('change', archivo, false);


    $(document).ready(function() {

    /*	$(function () {
    		if( $('#estado').prop('checked') ) {
			   $( "#someSwitchOptionDefault" ).prop( "checked", true );
			}else{
			   $( "#someSwitchOptionDefault" ).prop( "checked", false );
			}
    		
    	});*/

    	
/*    	$( "#someSwitchOptionDefault" ).change(function() {
		  	if( $( "#someSwitchOptionDefault" ).prop('checked') ) {
		   		$('#estado').prop( "checked", true );
			}else{
			   	$('#estado').prop( "checked", false );
			}
		});*/
    	
    	//estado
    	
    });
</script>