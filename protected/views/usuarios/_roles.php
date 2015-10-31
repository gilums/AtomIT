<h1>Crear Role</h1>
<div class="row">
<div class="col-md-12">
    <div class="col-md-6">
        <div class="form" role="form">    
        <?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
            'id'=>'role-form',
            'type' => 'horizontal',
            'enableAjaxValidation'=>true,
            'clientOptions'=>array('validateOnSubmit' =>true)
        )); ?>

            <div class="form-group">
                <div class="col-lg-2">
                    <?php echo $form->labelEx($role,'name'); ?>
                </div>
                <div class="col-lg-6">  
                    <?php echo $form->textField($role,'name'); ?>
                    <?php echo $form->error($role,'name'); ?>
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-2">
                    <?php echo $form->labelEx($role,'description'); ?>
                </div>
                <div class="col-lg-6">  
                    <?php echo $form->textField($role,'description'); ?>
                    <?php echo $form->error($role,'description'); ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-2">
                    <?php echo CHtml::submitButton('Crear',array('class'=>'btn btn-default')); ?>
                </div>
            </div>

        <?php $this->endWidget(); ?>
        </div><!-- form -->

    </div>
    <div class="col-md-6">
        <ul class="nav nav-tabs nav-stacked">

        <?php foreach (Yii::app()->authManager->getAuthItems() as $data):?>
        <?php $enabled=Yii::app()->authManager->checkAccess($data->name,$model->id); ?>
                <li>
                
                    <h4><?php echo $data->name; ?> 
                        <small>
                            <?php if($data->type==0)echo "Role"; ?>
                            <?php if($data->type==1)echo "Tarea"; ?>
                            <?php if($data->type==2)echo "Operacion"; ?>
                        </small>
                        <?php echo CHtml::link($enabled?"Off":"On",array("usuarios/asignarrol","id"=>$model->id,"item"=>$data->name),array("class"=>$enabled?"btn btn-primary":"btn btn-default")); ?>
                   </h4>
                   <p>
                        <?php #echo $enabled?"<span class='label label-danger'>Enabled</span>":""; ?>
                        <?php echo $data->description; ?>
                   </p>
                    <hr>
               </li>

        <?php endforeach; ?>

        </ul>
    </div>
</div>
</div>