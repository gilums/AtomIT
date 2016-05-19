<div class="forml" role="form"> 
        <?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
            'id'=>'role-form',
            'type' => 'horizontal',
        )); ?>
        <div class="col-lg-6">
            <div class="form-group">
                <div class="col-lg-4">
                    <?php echo $form->labelEx($role,'name'); ?>
                </div>
                <div class="col-lg-8">  
                    <?php echo $form->textField($role,'name',array('class'=>'form-control')); ?>
                    <?php echo $form->error($role,'name'); ?>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-4">
                    <?php echo $form->labelEx($role,'description'); ?>
                </div>
                <div class="col-lg-8">  
                    <?php echo $form->textField($role,'description',array('class'=>'form-control')); ?>
                    <?php echo $form->error($role,'description'); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-12">
                    <?php echo CHtml::submitButton('Crear',array('class'=>'btn btn-default')); ?>
                </div>
            </div>
        </div>
        <?php $this->endWidget(); ?>
</div><!-- form -->